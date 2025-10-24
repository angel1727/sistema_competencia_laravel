// Scroll horizontal con botones de desplazamiento
function scrollTabs(distance) {
  const container = document.querySelector('.tabs-container');
  container.scrollLeft += distance;
}

// Ejecutar cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", function () {
  // Centrar automáticamente la pestaña activa al hacer clic
  const tabsContainer = document.querySelector('.tabs-container');
  const tabButtons = document.querySelectorAll('.nav-tabs .nav-link');

  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      setTimeout(() => {
        const buttonRect = button.getBoundingClientRect();
        const containerRect = tabsContainer.getBoundingClientRect();
        const offset = buttonRect.left - containerRect.left - (containerRect.width / 2) + (buttonRect.width / 2);
        tabsContainer.scrollBy({ left: offset, behavior: 'smooth' });
      }, 100); // Espera a que se aplique la clase activa
    });
  });
});




/*ESTA PARTE DEL SCRIP FUNCIONAR PARA LOS MENUS HORIZONTAL Y VERTICAL */
function initMagicMenu(selector) {
  const menu = document.querySelector(selector);
  if (!menu) return;

  const listItems = menu.querySelectorAll('.list');
  const indicator = menu.querySelector('.indicator');

  function moveIndicatorToIcon(item) {
    const icon = item.querySelector('.icon');
    const menuRect = menu.getBoundingClientRect();
    const iconRect = icon.getBoundingClientRect();

    // Detectar si el menú es vertical (móvil)
    const isVertical = window.innerWidth <= 600;

    if (isVertical) {
      // Cálculo para menú móvil (vertical)
      const offsetTop = item.offsetTop + icon.offsetTop + (icon.offsetHeight / 2) - (indicator.offsetHeight / 2);
      const offsetLeft = icon.offsetLeft + (icon.offsetWidth / 2) - (indicator.offsetWidth / 2)-13;
      indicator.style.transform = `translate(${offsetLeft}px, ${offsetTop}px)`;
    } else {
      // Cálculo para menú horizontal (desktop) — NO TOCAR
      const shiftX = item.classList.contains('active') ? 6 : 0;
      const centerX = iconRect.left - menuRect.left + (iconRect.width / 2) - (indicator.offsetWidth / 2) - shiftX;
      indicator.style.transform = `translate(${centerX}px, -50%)`;
    }
  }


  listItems.forEach(item => {
    item.addEventListener('click', function () {
      listItems.forEach(el => el.classList.remove('active'));
      this.classList.add('active');

      // Mover indicador inmediatamente al hacer clic
      moveIndicatorToIcon(this);

      const icon = this.querySelector('.icon ion-icon');

      // Ajustar posición nuevamente cuando termine la transición del icono
      icon.addEventListener('transitionend', function handler(event) {
        if (event.propertyName === 'transform') {
          moveIndicatorToIcon(item);
          icon.removeEventListener('transitionend', handler);
        }
      });
    });
  });

  // Inicializar indicador en el activo o el primero al cargar sin retraso
  const activeItem = menu.querySelector('.list.active') || listItems[0];
  activeItem.classList.add('active');
  moveIndicatorToIcon(activeItem);
}

window.addEventListener('load', () => {
  initMagicMenu('.magic-menu-desktop');
  initMagicMenu('.magic-menu-mobile');
});
