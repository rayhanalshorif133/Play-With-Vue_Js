<template>
  <div>
    <Header title="User List" />
    <h4 class="text-2xl uppercase font-medium">User List {{ count_user }}</h4>
    <hr class="my-2" />
    <ul class="mx-auto w-full justify-center">
      <li
        v-for="user in userList"
        :key="user.name"
        class="text-xl mx-auto text-center justify-center capitalize flex space-x-4"
      >
        <div>{{ user.name }} - {{ user.age }}</div>
        <button
          v-on:click="removeUser(user)"
          type="button"
          class="bg-red-600 mt-2 w-fit mx-auto hover:bg-red-700 text-white font-bold py-[2px] px-4 rounded-sm"
        >
          Delete
        </button>
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
import Header from "./Header.vue";
export default {
  
  components: {
    Header,
  },


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
  data() {
    return {
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
  methods: {
    generatePeopleList(count) {
      const people = [];
      for (let i = 0; i < count; i++) {
        people.push({
          name: `MR ${i}`,
          age: Math.floor(Math.random() * 100),
        });
      }
      return people;
    },
    removeUser(user) {
      this.userList = this.userList.filter((item) => item.name !== user.name);
    },
    hanldeNewUserSubmit(e) {
      e.preventDefault();
      this.userList.push({
        name: this.newUser,
        age: this.age,
      });
      this.newUser = "";
      this.age = "";
    },
    handleSetFullName() {
      this.fullName = "John Doe";
    },
  },
};
</script>

<style></style>
