'use strict';

const quantityInput = document.getElementById('quantity');
const subtotalElement = document.querySelector('.product__total span');

quantityInput.addEventListener('input', () => {
  const quantity = parseInt(quantityInput.value);
  const price = 98; // base price
  const subtotal = quantity * price;
  subtotalElement.textContent = `${subtotal} €`;
});