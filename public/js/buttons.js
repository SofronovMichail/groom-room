//? Work cards
const auth = new Vue({
  el: '#app',
  data: {
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
  },
  methods: {
    goToMain: function () {
      window.location.href = '/';
    },
    goToEnter: function () {
      window.location.href = '/public/authentication.php';
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
          // sessionStorage.setItem("userKey", data);
          if (!data) {
            alert('неправильное имя пользователя или пароль');
          } else {
            this.key = data;
            console.log(this.key);
            window.location.href = '/';
          }
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
    },
  },
});
