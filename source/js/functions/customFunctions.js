export const fadeIn = (el, timeout, display) => {
  el.style.opacity = 0;
  el.style.display = display || 'block';
  el.style.transition = `all ${timeout}ms`;
  setTimeout(() => {
    el.style.opacity = 1;
  }, 10);
};
// ----------------------------------------------------
export const fadeOut = (el, timeout) => {
  el.style.opacity = 1;
  el.style.transition = `all ${timeout}ms`;
  el.style.opacity = 0;

  setTimeout(() => {
    el.style.display = 'none';
  }, timeout);
};
// ----------------------------------------------------
export function addMultiListener(element, eventNames, listener) {
  var events = eventNames.split(' ');
  for (var i = 0, iLen = events.length; i < iLen; i++) {
    element.addEventListener(events[i], listener, false);
  }
}
// ----------------------------------------------------
export const even = n => !(n % 2);
// ----------------------------------------------------
export const removeCustomClass = (item, customClass = 'active') => {
  item.classList.remove(customClass);
}
// ----------------------------------------------------
export const toggleCustomClass = (item, customClass = 'active') => {
  item.classList.toggle(customClass);
}
// ----------------------------------------------------
export const addCustomClass = (item, customClass = 'active') => {
  item.classList.add(customClass);
}
// ----------------------------------------------------
export const removeClassInArray = (arr, customClass = 'active') => {
  arr.forEach((item) => {
    item.classList.remove(customClass);
  });
}
// ----------------------------------------------------
export const addClassInArray = (arr, customClass = 'active') => {
  arr.forEach((item) => {
    item.classList.add(customClass);
  });
}
// ----------------------------------------------------
export const toggleClassInArray = (arr, customClass = 'active') => {
  arr.forEach((item) => {
    item.classList.toggle(customClass);
  });
}
//-----------------------------------------------------

export const elementHeight = (el, variableName) => {
  // el -- сам елемент (но не коллекция)
  // variableName -- строка, имя создаваемой переменной
  if (el) {
    function initListener() {
      const elementHeight = el.offsetHeight;
      document.querySelector(':root').style.setProperty(`--${variableName}`, `${elementHeight}px`);
    }
    window.addEventListener('DOMContentLoaded', initListener)
    window.addEventListener('resize', initListener)
  }
}

//-----------------------------------------------------

export const stickyHeader = (block, duration, delay, type) => {
  let prevScrollPos = window.pageYOffset;
  block.style.transition = `top ${duration}ms ${type}`;

  window.onscroll = function() {
    const currentScrollPos = window.pageYOffset;
    const scrollThreshold = 10; // Порог для начала анимации

    if (prevScrollPos > currentScrollPos) {
      block.style.top = "0";
      block.style.transitionDelay = `0ms`;
    } else {
      if (currentScrollPos > block.offsetHeight) {
        block.style.transitionDelay = `${delay}ms`;
        block.style.top = `-${block.offsetHeight}px`;
      }
    }

    prevScrollPos = currentScrollPos;
  }
}

// --------------------------------

// export const observeBodyMutation = (callback) => {
//   // Функция для обработки мутаций
//   const handleBodyMutation = (mutationsList, observer) => {
//     for (let mutation of mutationsList) {
//       if (mutation.type === 'childList') {
//         // Обработка изменений в DOM

//         console.log('reinit');
//         callback();
//       }
//     }
//   };

//   // Настройка MutationObserver
//   const observer = new MutationObserver(handleBodyMutation);

//   // Опции для наблюдения за изменениями (в данном случае, изменениями в дочерних элементах тела)
//   const observerConfig = {
//     childList: true,
//     subtree: true,
//   };

//   // Начинаем наблюдение за мутациями в теле страницы
//   const bodyElement = document.body;
//   observer.observe(bodyElement, observerConfig);
// };
