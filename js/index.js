function showAddStudentModal() {
    document.getElementById('addStudentModal').style.display = 'flex';
}

function hideAddStudentModal() {
    document.getElementById('addStudentModal').style.display = 'none';
}

// document.getElementById('addStudentForm').addEventListener('submit', function(e) {
//     e.preventDefault();
//     const formData = new FormData(this);
//     fetch('add_student.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.text())
//     .then(data => {
//         alert(data);
//         location.reload();
//     });
// });

document.getElementById('addStudentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form values
    const name = document.getElementById('name').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const marks = document.getElementById('marks').value.trim();

    // Validate form values
    if (name === '' || subject === '' || marks === '') {
        alert('All fields are required.');
        return;
    }

    if (isNaN(marks) || marks < 0) {
        alert('Marks should be a non-negative number.');
        return;
    }

    // If validation passes, submit the form
    const formData = new FormData(this);
    fetch('/module/student/add_student.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (data.includes('successfully')) {
            location.reload();
        }
    });
});


function updateStudent(id, field, value) {
    const newValue = value.innerText.trim();
    const originalValue = value.getAttribute('data-original-text').trim();

    if (newValue === originalValue) {
        // No change detected, do not send update request
        return;
    }

    const formData = new FormData();
    formData.append('id', id);
    formData.append('field', field);
    formData.append('value', newValue);

    fetch('/module/student/edit_student.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        value.setAttribute('data-original-text', newValue);
    });
}

function deleteStudent(id) {
    if (confirm('Are you sure you want to delete this student?')) {
        fetch(`/module/student/delete_student.php?id=${id}`)
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload();
        });
    }
}
