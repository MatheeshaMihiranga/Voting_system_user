let cars = ["Saab", "Volvo", "BMW"];


cars.forEach(v => {
    document.getElementById("demo").innerHTML += v + '<br />';
})
function openModal(modal) {
    console.log(modal);
    // Get the modal element
    var newModal = document.getElementById("myModal" + modal);
    // Get the close button element
    var closeModalBtn = document.getElementById("close" + modal);
    // Open the modal when the open button is clicked
    newModal.style.display = "block";

    // Close the modal when the close button is clicked
    closeModalBtn.onclick = function () {
        newModal.style.display = "none";
    };
    // Close the modal when the user clicks anywhere outside of it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

function closeConfirm() {
    document.getElementById("modal").style.display = "none";
}
