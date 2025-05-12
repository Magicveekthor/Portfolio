// paypal.Buttons({
//     //Sets up the transaction when a payment button is clicked
//     createOrder: function(data, actions){
//         return actions.order.create({
//             purchase_units: [{
//                 amount: {
//                     value: '<?php echo $amount; ?>' // can reference varibale or functions .Examaple: `value: document.getElementById('...').value`
//                 }
//             }]
//         });
//     },

//     //Finalize the transaction after paypal after approval
//     onApprove: function(data, actions) {
//         return actions.order.capture().then(function(orderData){
//             //Succesfull capture! 
//             console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            
//             var transaction = orderData.purchase_units[0].payments.captures[0];
//             alert('Transcation' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

//             //When ready to go live, remove the alert and show a success message within this page. For example:
//             //var element = document.getElementById('paypal-button-container');
//             //element.innerHTML = '';
//             //element.innerHTML = '<h3>Thank you for your payment!</h3>';
//             //Or go to another URL: actions.redirect('thankyou.html');
//         });
//     }
// }).render('#paypal-button-container');




  
