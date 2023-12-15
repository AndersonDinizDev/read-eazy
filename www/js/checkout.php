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
</script>