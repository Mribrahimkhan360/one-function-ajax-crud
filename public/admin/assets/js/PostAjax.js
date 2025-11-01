import axios from 'axios';
import Dropzone from 'dropzone';
window.axios = axios;
window.Dropzone = Dropzone;

Dropzone.autoDiscover = false;

document.addEventListener('DOMContentLoaded', () => {
    // CSRF Token Setup
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Create Post Dropzone
    const createDropzone = new Dropzone('#create-dropzone', {
        url: '/api/posts',
        autoProcessQueue: false,
        uploadMultiple: false,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictRemoveFile: 'ফাইল মুছুন',
        dictFileTooBig: 'ফাইলটি খুব বড় ({{filesize}}MB). সর্বোচ্চ: {{maxFilesize}}MB।',
        init: function () {
            const dropzone = this;
            document.getElementById('create-post-form').addEventListener('submit', function (e) {
                e.preventDefault();
                if (!this.checkValidity()) {
                    this.classList.add('was-validated');
                    return;
                }

                const title = document.getElementById('title-input').value;
                const content = document.getElementById('content-input').value;
                const status = document.getElementById('post-status-input').value;
                const formData = new FormData();
                formData.append('title', title);
                formData.append('content', content);
                formData.append('status', status);
                if (dropzone.getAcceptedFiles().length > 0) {
                    formData.append('image', dropzone.getAcceptedFiles()[0]);
                }

                axios.post('/api/posts', formData)
                    .then(response => {
                        loadPosts();
                        this.reset();
                        dropzone.removeAllFiles();
                        this.classList.remove('was-validated');
                    })
                    .catch(error => {
                        console.error('পোস্ট তৈরিতে ত্রুটি:', error);
                        alert('পোস্ট তৈরি ব্যর্থ হয়েছে। অনুগ্রহ করে আবার চেষ্টা করুন।');
                    });
            });
        }
    });

    // Edit Post Dropzone
    const editDropzone = new Dropzone('#edit-dropzone', {
        url: '/api/posts/0',
        autoProcessQueue: false,
        uploadMultiple: false,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        addRemoveLinks: true,
        dictRemoveFile: 'ফাইল মুছুন',
        dictFileTooBig: 'ফাইলটি খুব বড় ({{filesize}}MB). সর্বোচ্চ: {{maxFilesize}}MB।'
    });

    // Load Posts
    function loadPosts() {
        axios.get('/api/posts')
            .then(response => {
                const postsList = document.getElementById('posts-list');
                postsList.innerHTML = '';
                response.data.forEach(post => {
                    const div = document.createElement('div');
                    div.className = 'card mb-3';
                    div.innerHTML = `
                        <div class="card-body">
                            <h5 class="card-title">${post.title}</h5>
                            <p class="card-text">${post.content}</p>
                            ${post.image ? `<img src="/storage/${post.image}" alt="${post.title}" class="mb-3 img-fluid" style="max-width: 200px;">` : ''}
                            <p class="text-muted">স্ট্যাটাস: ${post.status || 'Draft'}</p>
                            <button class="btn btn-sm btn-primary me-2" onclick="editPost(${post.id})">এডিট</button>
                            <button class="btn btn-sm btn-danger" onclick="deletePost(${post.id})">ডিলিট</button>
                        </div>
                    `;
                    postsList.appendChild(div);
                });
            })
            .catch(error => console.error('পোস্ট লোডে ত্রুটি:', error));
    }

    // Edit Post
    window.editPost = function (id) {
        axios.get(`/api/posts/${id}`)
            .then(response => {
                document.getElementById('edit-post-id').value = response.data.id;
                document.getElementById('edit-title-input').value = response.data.title;
                document.getElementById('edit-content-input').value = response.data.content;
                document.getElementById('edit-post-status-input').value = response.data.status || 'Draft';
                document.getElementById('edit-postlogo-img').src = response.data.image ? `/storage/${response.data.image}` : '/assets/images/users/avatar-1.jpg';
                document.getElementById('edit-post-form').style.display = 'block';
                document.getElementById('create-post-form').style.display = 'none';
                editDropzone.removeAllFiles();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            })
            .catch(error => {
                console.error('পোস্ট ফেচে ত্রুটি:', error);
                alert('পোস্ট লোড ব্যর্থ হয়েছে।');
            });
    };

    // Update Post
    document.getElementById('edit-post-form').addEventListener('submit', function (e) {
        e.preventDefault();
        if (!this.checkValidity()) {
            this.classList.add('was-validated');
            return;
        }

        const id = document.getElementById('edit-post-id').value;
        const title = document.getElementById('edit-title-input').value;
        const content = document.getElementById('edit-content-input').value;
        const status = document.getElementById('edit-post-status-input').value;
        const formData = new FormData();
        formData.append('title', title);
        formData.append('content', content);
        formData.append('status', status);
        if (editDropzone.getAcceptedFiles().length > 0) {
            formData.append('image', editDropzone.getAcceptedFiles()[0]);
        }
        formData.append('_method', 'PUT');

        axios.post(`/api/posts/${id}`, formData)
            .then(response => {
                loadPosts();
                this.reset();
                this.style.display = 'none';
                document.getElementById('create-post-form').style.display = 'block';
                editDropzone.removeAllFiles();
                this.classList.remove('was-validated');
            })
            .catch(error => {
                console.error('পোস্ট আপডেটে ত্রুটি:', error);
                alert('পোস্ট আপডেট ব্যর্থ হয়েছে।');
            });
    });

    // Delete Post
    window.deletePost = function (id) {
        if (confirm('আপনি কি এই পোস্টটি ডিলিট করতে চান?')) {
            axios.delete(`/api/posts/${id}`)
                .then(() => loadPosts())
                .catch(error => {
                    console.error('পোস্ট ডিলিটে ত্রুটি:', error);
                    alert('পোস্ট ডিলিট ব্যর্থ হয়েছে।');
                });
        }
    };

    // Image Preview for Create Form
    document.getElementById('post-image-input').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            document.getElementById('postlogo-img').src = URL.createObjectURL(file);
        }
    });

    // Image Preview for Edit Form
    document.getElementById('edit-post-image-input').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            document.getElementById('edit-postlogo-img').src = URL.createObjectURL(file);
        }
    });

    // Initial Load
    loadPosts();
});
