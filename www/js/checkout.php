<script>
  const openCheckout = document.getElementById("start-checkout");
  const modalOverlay = document.getElementById("modal-checkout");
  const closeCheckout = document.getElementById("modal-checkout-close");
  const mp = new MercadoPago("TEST-86c88a3b-6b01-441c-9927-548a497a5536");


  closeCheckout.addEventListener("click", function() {
    modalOverlay.style.opacity = "0"

    setTimeout(() => {
      modalOverlay.style.display = "none";
    }, 600)
  })

  $(document).on('click', '.add-item-cart', function() {
    const itemId = $(this).data('id');
    const itemName = $(this).data('name');
    const itemValue = $(this).data('value');
    const itemImage = $(this).data('image');

    $.post('/api/add_cart.php', {
      id: itemId,
      name: itemName,
      value: itemValue,
      image: itemImage
    }, function(response) {

      setTimeout(() => {
        location.reload();
      }, 300)
    });
  });

  $(document).on('click', '.del-cart', function() {
    const itemIdToRemove = $(this).data('id');

    $.post('/api/del_cart.php', {
      id: itemIdToRemove
    }, function(response) {

      setTimeout(() => {
        location.reload();
      }, 300)
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
    <?php if (isset($_SESSION['user-id'])) : ?>
      openCheckout.addEventListener("click", function() {
        modalOverlay.style.display = "flex";
        setTimeout(() => {
          modalOverlay.style.opacity = "1";
        }, 600);
      });
    <?php else : ?>
      openCheckout.addEventListener("click", function() {
        alert('Você precisa estar logado para fechar o pedido.');
      });
    <?php endif; ?>
  });


  (async function getIdentificationTypes() {
    try {
      const identificationTypes = await mp.getIdentificationTypes();
      const identificationTypeElement = document.getElementById('form-checkout__identificationType');

      createSelectOptions(identificationTypeElement, identificationTypes);
    } catch (e) {
      return console.error('Error getting identificationTypes: ', e);
    }
  })();

  function createSelectOptions(elem, options, labelsAndKeys = {
    label: "name",
    value: "id"
  }) {
    const {
      label,
      value
    } = labelsAndKeys;

    elem.options.length = 0;

    const tempOptions = document.createDocumentFragment();

    options.forEach(option => {
      const optValue = option[value];
      const optLabel = option[label];

      const opt = document.createElement('option');
      opt.value = optValue;
      opt.textContent = optLabel;

      tempOptions.appendChild(opt);
    });

    elem.appendChild(tempOptions);
  }
</script>