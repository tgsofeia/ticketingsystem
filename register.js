document.addEventListener('DOMContentLoaded', function() {
    const date1Radio = document.getElementById('date1');
    const date2Radio = document.getElementById('date2');
    const categoriesDate1 = document.getElementById('categories-date1');
    const categoriesDate2 = document.getElementById('categories-date2');
    const registerForm = document.getElementById('register-form');

    date1Radio.addEventListener('change', toggleCategories);
    date2Radio.addEventListener('change', toggleCategories);

    registerForm.addEventListener('submit', function(event) {
        // Prevent form submission if no category is selected
        if (!validateCategories()) {
            event.preventDefault();
            alert("Please select at least one category.");
        }
    });

    function toggleCategories() {
        if (date1Radio.checked) {
            categoriesDate1.style.display = 'block';
            categoriesDate2.style.display = 'none';
            resetQuantities('date2');
        } else if (date2Radio.checked) {
            categoriesDate1.style.display = 'none';
            categoriesDate2.style.display = 'block';
            resetQuantities('date1');
        }
        calculateTotalPrice();
    }

    function resetQuantities(date) {
        const quantities = document.querySelectorAll(`input[name^="quantity-${date}"]`);
        quantities.forEach(quantity => quantity.value = 0);
    }

    const categoryInputs = document.querySelectorAll('input[type="number"]');
    categoryInputs.forEach(input => {
        input.addEventListener('change', handleQuantityChange);
    });

    function handleQuantityChange(event) {
        const selectedDate = date1Radio.checked ? 'date1' : 'date2';
        const quantities = document.querySelectorAll(`input[name^="quantity-${selectedDate}"]`);
        let total = 0;
        quantities.forEach(quantity => total += parseInt(quantity.value));
        if (total > 4) {
            event.target.value = 0;
            alert("You can select up to 4 tickets only.");
        }
        calculateTotalPrice();
    }

    function calculateTotalPrice() {
        const categoryPrices = {};
        const allCategoryInputs = document.querySelectorAll('input[type="number"]');
        let totalPrice = 0;

        allCategoryInputs.forEach(input => {
            const categoryName = input.name.split('[')[1].split(']')[0];
            const date = input.name.includes('date1') ? 'date1' : 'date2';
            const price = parseFloat(input.getAttribute('data-price'));
            const quantity = parseInt(input.value);

            if (input.name.includes(date)) {
                categoryPrices[`${date}-${categoryName}`] = (categoryPrices[`${date}-${categoryName}`] || 0) + (price * quantity);
                console.log(`Adding ${quantity} tickets of ${categoryName} at ${price} MYR each for ${date}`);
            }
            totalPrice += price * quantity;
        });

        const totalPriceContainer = document.getElementById('total-price');
        if (totalPriceContainer) {
            totalPriceContainer.textContent = `MYR ${totalPrice.toFixed(2)}`;
        }

        for (const key in categoryPrices) {
            const [date, category] = key.split('-');
            const categoryTotalPriceElement = document.getElementById(`total-price-${date}-${category}`);
            if (categoryTotalPriceElement) {
                categoryTotalPriceElement.textContent = `Total Price (${category}): MYR ${categoryPrices[key].toFixed(2)}`;
            }
        }
    }

    function validateCategories() {
        const selectedDate = date1Radio.checked ? 'date1' : 'date2';
        const quantities = document.querySelectorAll(`input[name^="quantity-${selectedDate}"]`);

        // Check if at least one category is selected
        for (const quantity of quantities) {
            if (parseInt(quantity.value) > 0) {
                return true;
            }
        }

        return false; // No category selected
    }
});
