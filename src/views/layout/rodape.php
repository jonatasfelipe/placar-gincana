</body>

<script src="src/public/assets/js/regressiva.js"></script>

<script>
  const toggleBtn = document.querySelector('.hamburguer_btn');
  const toggleBtnIcon = document.querySelector('.hamburguer_btn i')
  const dropDownMenu = document.querySelector('.dropdown_menu')

  toggleBtn.onclick = function() {
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains('open')

    toggleBtnIcon.classList = isOpen ?
      'fa-solid fa-xmark' :
      'fa-solid fa-bars'
  }
</script>