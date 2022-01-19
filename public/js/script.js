//? Work cards
const works = new Vue({
  el: '#app',
  data: {
    cards: [
      {
        img: 'public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: 'public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: 'public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: 'public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: 'public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
    ],
    selected: '',
    options: [
      { text: 'Стрижка', value: 'Стрижка' },
      { text: 'Груминг', value: 'Груминг' },
      { text: 'Вакцинация', value: 'Вакцинация' },
    ],
  },
  methods: {
    add: function () {
      this.cards.push({
        img: 'public/img/dog.png',
        title: this.name,
        servise: this.selected,
        status: 'Принято в обработку',
      });
      this.name = '';
      this.selected = '';
    },
    goToMain: function () {
      window.location.href = '/';
    },
    goToEnter: function () {
      window.location.href = './public/authentication.php';
    },
  },
});
const reg = new Vue({
  el: '#authentication',
  data: {
    login: '',
    password: '',
  },
  methods: {
    reg: function () {
      console.log(this.login, this.password);
      this.login = '';
      this.password = '';
    },
  },
});
