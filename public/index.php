<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <title>GroomRoom</title>
</head>

<body>
  <div id="app">
    <div class="header">
      <div class="header-title">GROOMING<span class="header-title_text">Service for dogs and cats</span></div>
      <div class="header-menu">
        <div class="header-menu-main header-menu_item header-menu_item--checked">
          <svg class="menu-main_svg" width="24" height="25" viewBox="0 0 24 25" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M10 20.5V14.5H14V20.5H19V12.5H22L12 3.5L2 12.5H5V20.5H10Z" fill="#6D79EB" />
          </svg>
          <div @click="goToMain" class="menu-main_text">ГЛАВНАЯ</div>
        </div>
        <div class="header-menu-enter header-menu_item">
          <svg class="menu-main_svg" width="24" height="25" viewBox="0 0 24 25" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M12.65 10.5C11.83 8.17 9.61 6.5 7 6.5C3.69 6.5 1 9.19 1 12.5C1 15.81 3.69 18.5 7 18.5C9.61 18.5 11.83 16.83 12.65 14.5H17V18.5H21V14.5H23V10.5H12.65ZM7 14.5C5.9 14.5 5 13.6 5 12.5C5 11.4 5.9 10.5 7 10.5C8.1 10.5 9 11.4 9 12.5C9 13.6 8.1 14.5 7 14.5Z"
              fill="#C7C7C7" />
          </svg>
          <div @click="goToEnter" class="menu-enter_text">ВХОД</div>
        </div>
      </div>
    </div>
    <div class="content" id="content-main">
      <div class="content-sub">
        <div class="sub_text">Профессиональная укладка для ваших домашних питомцев</div>
        <form id="form" class="sub-form">
          <h4 class="form_title">Создайте заявку</h4>
          <input v-model="name" type="text" class="form_input form_item" placeholder="Кличка животного" required>
          <select v-model="selected" class="form_select form_item" name="" required>
            <option disabled value="">Выберите услугу</option>
            <option v-for="option in options" v-bind:value="option.value">{{ option.text }}</option>
          </select>
          <h4>{{ name }}, {{ selected }}</h4>
          <input type="button" value="Записаться" class="form_button form_item" @click="add"></input>
        </form>
      </div>
      <div class="content-gallery">
        <div class="gallery_title">Наши работы</div>
        <div id="container-for-card" class="gallery-container">
          <div v-for="card in cards" class="container_item">
            <img class="item-img" :src="card.img" alt="dog">
            <div class="item_title">{{card.title}}</div>
            <div class="item_title">{{card.servise}}</div>
            <div class="item_title">{{card.status}}</div>
          </div>

        </div>
      </div>
    </div>
    <div class="footer">
      groom-salon.com 2000-2999
    </div>
  </div>
  <script src="public/js/vue.js"></script>
  <script src="public/js/script.js"></script>
</body>

</html>