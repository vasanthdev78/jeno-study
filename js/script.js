const sidebar = document.querySelector('.sidebar');
const toggleBtn = document.querySelector('.toogle-btn');
const searchForm = document.querySelector('.form-inline');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');

    // Adjust search form position based on sidebar state
    if (sidebar.classList.contains('active')) {
        searchForm.style.left = '280px'; // Adjust as per your sidebar width
    } else {
        searchForm.style.left = '95px'; // Default position when sidebar is inactive
    }
})