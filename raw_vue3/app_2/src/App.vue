<template>
  <div class="text-center mx-auto justify-center mt-10">
    <div v-show="showOld">
      <!-- if ese -->
      <h1 v-if="isTrue" v-html="title"></h1>
      <h3 v-else>Not Found</h3>
      <!-- v show -->
      <h2 v-show="isShow">Welcome to Your Vue.js App</h2>

      <!-- do something (count) -->

      <h4 v-show="isShow" class="text-2xl font-semibold" v-text="count"></h4>

      <!-- For Loop -->
      <ul>
        <li v-for="item in 2" :key="item" class="text-2xl">{{ item }}</li>
      </ul>
    </div>
    <h4 class="text-2xl uppercase font-medium">User List {{ count_user }}</h4>
    <hr class="my-2" />
    <ul>
      <li v-for="user in userList" :key="user.name" class="text-xl capitalize">
        {{ user.name }} - {{ user.age }}
      </li>
    </ul>
    <div class="w-1/2 mx-auto">
      <form v-on:submit="hanldeNewUserSubmit" class="flex flex-col">
        <div>
          <label class="text-xl">Name</label>
          <input
            class="border border-gray-400 py-1 px-2 mt-10 mx-3"
            type="text"
            v-model.lazy="newUser"
            placeholder="Enter your name"
          />
        </div>
        <div>
          <label class="text-xl">Age</label>
          <input
            class="border border-gray-400 py-1 px-2 mt-10 mx-3"
            type="text"
            v-model.lazy="age"
            placeholder="Enter your age"
          />
        </div>
        <button
          type="submit"
          class="bg-blue-600 mt-2 w-fit mx-auto hover:bg-blue-700 text-white font-bold py-[6px] px-4 rounded-sm"
        >
          Add User
        </button>
      </form>
      <h3>
        {{ firstName }} {{ lastName }}
        <br />
        {{ fullName }}
      </h3>
      <button
        v-on:click="handleSetFullName"
        type="button"
        class="bg-red-600 mt-2 w-fit mx-auto hover:bg-red-700 text-white font-bold py-[6px] px-4 rounded-sm"
      >
        Change Full Name
      </button>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    count_user() {
      return this.userList.length;
    },
    fullName: {
      get() {
        return `${this.firstName} - ${this.lastName}`;
      },
      set(value) {
        const [firstName, lastName] = value.split(" ");
        this.firstName = firstName;
        this.lastName = lastName;
      },
    },
  },
  name: "App",
  data() {
    return {
      title: "<h2>Welcome to h2</h2>",
      showOld: false,
      isTrue: true,
      isShow: true,
      count: 0,
      newUser: "",
      age: "",
      firstName: "John",
      lastName: "Doe",

      userList: [
        { name: "MR A", age: 20 },
        { name: "MR B", age: 21 },
        { name: "MR C", age: 22 },
        { name: "MR D", age: 23 },
        { name: "MR E", age: 24 },
      ],
      newUsers: this.generatePeopleList(100),
    };
  },
  mounted() {
    setInterval(() => {
      this.count++;
    }, 1000);
  },
  methods: {
    hanldeNewUserSubmit(e) {
      e.preventDefault();
      this.userList.push({ name: this.newUser, age: this.age });
      this.newUser = "";
      this.age = "";
    },
    handleSetFullName() {
      const getFullName =
        this.newUsers[Math.floor(Math.random() * this.newUsers.length)];
      this.fullName = getFullName.firstName + " " + getFullName.lastName;
    },
    generatePeopleList(count = 10) {
      const peopleList = [];
      const names = [
        "John",
        "Alice",
        "Bob",
        "Eva",
        "Michael",
        "Sophie",
        "David",
        "Emma",
        "Daniel",
        "Olivia",
      ];
      for (let i = 0; i < count; i++) {
        const firstName = names[Math.floor(Math.random() * names.length)];
        const lastName = names[Math.floor(Math.random() * names.length)];
        peopleList.push({ firstName, lastName });
      }

      return peopleList;
    },
  },
};
</script>

<style></style>
