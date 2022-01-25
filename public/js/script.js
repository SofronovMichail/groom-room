//? Work cards
const works = new Vue({
  el: '#app',
  data: {
    name: '',
    selected: '',
    cards: [
      {
        img: '/public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: '/public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: '/public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: '/public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
      {
        img: '/public/img/dog.png',
        title: 'Dog #1',
        servise: 'Стрижка',
        status: 'Завершено',
      },
    ],
    options: [
      { text: 'Стрижка', value: 'Стрижка' },
      { text: 'Груминг', value: 'Груминг' },
      { text: 'Вакцинация', value: 'Вакцинация' },
    ],
    type: 'auth',
    key: '',
    login: '',
    password: '',
    reg_login: '',
    reg_password: '',
    view: {
      activeReg: false,
      activeTitleReg: false,
      activeEmail: 'none',
      activeAuth: true,
      activeTitleAuth: true,
    },
    viewTextTitle: true,
  },
  methods: {
    add: function () {
      this.cards.push({
        img: '/public/img/dog.png',
        title: this.name,
        servise: this.selected,
        status: 'Принято в обработку',
      });
      this.name = '';
      this.selected = '';
    },
    goToMain: function () {
      window.location.href = '/public/index.php';
      this.viewTextTitle = true;
    },
    goToEnter: function () {
      window.location.href = '/public/authentication.php';
      this.viewTextTitle = false;
    },
    goToRequsts: function () {
      window.location.href = '/public/requests.php';
    },
    auth: function () {
      this.type = 'auth';
      this.view.activeTitleReg = false;
      this.view.activeTitleAuth = true;
    },
    reg: function () {
      this.type = 'reg';
      this.view.activeTitleAuth = false;
      this.view.activeTitleReg = true;
    },
    loginUser: function () {
      const data = {
        type: 'LOGIN_USER',
        login: this.login,
        password: this.password,
      };

      const fd = new FormData();
      for (let i in data) {
        fd.append(i, data[i]);
      }

      fetch('http://groom-room/php_vue.php', {
        method: 'POST',
        body: fd,
      })
        .then((response) => response.json())
        .then((data) => {
          if (!data) {
            alert('неправильное имя пользователя или пароль');
          } else {
            sessionStorage.setItem('userKey', data);
            this.key = data;
            console.log(this.key);
            window.location.href = '/public/index.php';
          }
          this.login = '';
          this.password = '';
        });
    },
    registerUser: function () {
      const data = {
        type: 'REGISTER_USER',
        login: this.reg_login,
        password: this.reg_password,
      };

      const fd = new FormData();
      for (let i in data) {
        fd.append(i, data[i]);
      }

      fetch('http://groom-room/php_vue.php', {
        method: 'POST',
        body: fd,
      })
        .then((response) => response.text())
        .then((data) => {
          console.log(data);
        });
      this.reg_login = '';
      this.reg_password = '';
    },
    logoutUser: function () {
      this.key = '';
      sessionStorage.clear();
      window.location.href = '/public/authentication.php';
    },
    keyUpdate: function () {
      if (sessionStorage.getItem('userKey')) {
        this.key = sessionStorage.getItem('userKey');
      }
    },
  },
  mounted() {
    this.keyUpdate();
  },
});
