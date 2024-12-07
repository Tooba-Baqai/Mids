'use strict';
// ?============= PRELOADER ===================== //


 const preloader = document.querySelector("[data-preloader]");

 window.addEventListener("load", function () {
   preloader.classList.add("loaded");
   document.body.classList.add("loaded");
 });
 //

 function purchaseCart() {
  console.log(cart); // To check the data structure and contents
  const cartData = JSON.stringify(cart); // Converts the cart array to a JSON string

  fetch('purchase.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: cartData,
  })
  .then(response => response.text())
  .then(data => {
      console.log(data); // Log response from PHP
      alert(data); // Show confirmation message
      cart = []; // Clear the cart
      updateCart(); // Update the UI to reflect the empty cart
  })
  .catch(error => console.error('Error:', error));
}


 
// Add a click event listener to the button with the data-nav-toggler attribute
document.querySelector("[data-nav-toggler]").addEventListener("click", function() {
  const menuIcon = document.getElementById("menuIcon");
  // Toggle between classes
  menuIcon.classList.toggle("fa-bars");
  menuIcon.classList.toggle("fa-xmark");
});




// ?============= MOBILE NAV TOGGLE ===================== //

const navbar = document.querySelector("[data-navbar]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNavbar = function () { 
  navbar.classList.toggle("active"); 
}
navToggler.addEventListener("click", toggleNavbar);




// ?============= HEADER ===================== //
    // ?============= active header when window scrolled to 50px ===================== //

 const header = document.querySelector("[data-header]");

 const activeHeader = function () {
   window.scrollY > 50 ? header.classList.add("active")
     : header.classList.remove("active");
 }
 
 window.addEventListener("scroll", activeHeader);

 document.addEventListener('DOMContentLoaded', function() {
  const authorElement = document.getElementById('author');
  const authorText = '&copy; 2024 Copyright All Right Reserved By Tooba Baqai & Faareha Raza';
  authorElement.innerHTML = authorText;
});

