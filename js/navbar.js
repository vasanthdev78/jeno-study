const sidebar = document.querySelector('.sidebar');
const toggleBtn = document.querySelector('.toggle-btn');
const searchForm = document.querySelector('.form-inline');
const container = document.querySelector('.container-fluid');;

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    container.classList.toggle('container-active'); // Toggle a class to adjust container size

    // Adjust search form position based on sidebar state
    if (sidebar.classList.contains('active')) {
        searchForm.style.marginLeft = '280px'; // Adjust as per your sidebar width
    } else {
        searchForm.style.marginLeft = '95px'; // Default position when sidebar is inactive
    }
});
