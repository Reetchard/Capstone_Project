// Handle billing form submission
document.getElementById('billingForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const memberId = document.getElementById('id').value;
    const memberName = document.getElementById('name').value;
    const billingDate = document.getElementById('date').value;
    const amount = document.getElementById('amount').value;
    const paymentMethod = document.getElementById('paymentMethod').value;
    const paymentNumber = document.getElementById('paymentNumber').value;

    const formData = {
        memberId: memberId,
        memberName: memberName,
        billingDate: billingDate,
        amount: amount,
        paymentMethod: paymentMethod,
        paymentNumber: paymentNumber
    };

    fetch('saveBilling.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('alert').innerHTML = `<div class="alert alert-success">Billing details saved successfully!</div>`;
        } else {
            document.getElementById('alert').innerHTML = `<div class="alert alert-danger">Error saving billing details: ${data.message}</div>`;
        }
    })
    .catch(error => {
        document.getElementById('alert').innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
    });
});
