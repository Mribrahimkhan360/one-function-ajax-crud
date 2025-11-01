document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('project-update-form');
    const projectImageInput = document.getElementById('project-image-input');
    const projectLogoImg = document.getElementById('projectlogo-img');

    // Preview image before upload
    projectImageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                projectLogoImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle form submission
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(form);
        try {
            const response = await fetch('/api/projects/' + formData.get('id'), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData,
            });

            const result = await response.json();
            if (response.ok) {
                alert('Project updated successfully!');
                window.location.href = '/projects'; // Redirect to project list or desired page
            } else {
                alert('Error: ' + result.message);
            }
        } catch (error) {
            console.error('Error updating project:', error);
            alert('An error occurred while updating the project.');
        }
    });
});
