<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .button {
          cursor: pointer;
          font-weight: 500;
          left: 3px;
          line-height: inherit;
          position: relative;
          text-decoration: none;
          text-align: center;
          border-style: solid;
          border-width: 1px;
          border-radius: 3px;
          -webkit-appearance: none;
          -moz-appearance: none;
          display: inline-block;
        }
        
        .button--small {
          padding: 10px 20px;
          font-size: 0.875rem;
        }
        
        .button--green {
          outline: none;
          background-color: #64d18a;
          border-color: #64d18a;
          color: white;
          transition: all 200ms ease;
        }
        
        .button--green:hover {
          background-color: #8bdda8;
          color: white;
        }
    </style>
</head>
<body>

      <form id="payment-form" action="/route/on/your/server" method="post">
        <!-- Putting the empty container you plan to pass to
          `braintree.dropin.create` inside a form will make layout and flow
          easier to manage -->
        <div id="dropin-container"></div>
        <input type="submit" />
        <input type="hidden" id="nonce" name="payment_method_nonce"/>
      </form>

    <script>
        var button = document.querySelector('#submit-button');
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            container: '#dropin-container'
            }, function (error, dropinInstance) {
              if (error) console.error(error);

              form.addEventListener('submit', event => {
              event.preventDefault();

              dropinInstance.requestPaymentMethod((error, payload) => {
                if (error) console.error(error);
                
                // Step four: when the user is ready to complete their
                //   transaction, use the dropinInstance to get a payment
                //   method nonce for the user's selected payment method, then add
                //   it a the hidden field before submitting the complete form to
                //   a server-side integration
                document.getElementById('nonce').value = payload.nonce;
                form.submit();
              });
            });
          });
    </script>
</body>
</html>

