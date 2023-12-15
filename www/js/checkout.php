<script>
    const openCheckout = document.getElementById("start-checkout");
    const modalOverlay = document.getElementById("modal-checkout");


    openCheckout.addEventListener("click", function() {

        modalOverlay.style.display = "flex";

        setTimeout(() => {
            modalOverlay.style.opacity = "1";
        }, 600)
    })
</script>