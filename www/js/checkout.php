<script>
    const openCheckout = document.getElementById("start-checkout");
    const modalOverlay = document.getElementById("modal-checkout");
    const closeCheckout = document.getElementById("modal-checkout-close");


    openCheckout.addEventListener("click", function() {

        modalOverlay.style.display = "flex";

        setTimeout(() => {
            modalOverlay.style.opacity = "1";
        }, 600)
    })

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

  $.post('/api/add_cart.php', {id: itemId, name: itemName, value: itemValue, image: itemImage}, function(response) {

    setTimeout(() => {
      location.reload();
    }, 300)
  });
});

$(document).on('click', '.del-cart', function() {
    const itemIdToRemove = $(this).data('id');

    $.post('/api/del_cart.php', {id: itemIdToRemove}, function(response) {

      setTimeout(() => {
      location.reload();
    }, 300)
    });
});
</script>