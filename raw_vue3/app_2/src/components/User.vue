<script>
import Header from "./Header.vue";
import Button from "./common/Button.vue";
export default {
  components: {
    Header,
    Button,
  },
  data() {
    return {
      users: [],
    };
  },
  methods: {
    fetchUser() {
      fetch("https://dummyjson.com/users")
        .then((res) => res.json())
        .then((res) => {
          const { users } = res;
          this.users.push(...users);
        });
    },
  },
  mounted() {
    this.fetchUser();
  },
};
</script>

<template>
  <div>
    <Header title="User" />
    <div class="w-fit mx-auto justify-center">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
          class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
          <caption
            class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800"
          >
            User List
          </caption>
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="px-6 py-3">
                <input
                  type="checkbox"
                  class="form-checkbox h-4 w-4 cursor-pointer text-indigo-600 transition duration-150 ease-in-out"
                />
              </th>
              <th scope="col" class="px-6 py-3">#List</th>
              <th scope="col" class="px-6 py-3">Photo</th>
              <th scope="col" class="px-6 py-3">User name</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="user in this.users"
              :key="user.id"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            >
                <th
                    scope="row"
                    class="px-6 py-4 whitespace-nowrap text-sm font-medium cursor-pointer text-gray-900 dark:text-white" 
                >
                    <input
                        type="checkbox"
                        class="form-checkbox cursor-pointer h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                    />
                </th>
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ user.id }}
              </th>
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <img :src="user.image" alt="{{ user.image }}" class="h-10" />
              </th>
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ user.firstName }} {{ user.lastName }}
              </th>
              <td class="px-6 py-4">{{ user.email }}</td>
              <td class="px-6 py-4 text-right">
                <div class="flex space-x-1">
                  <Button icon="fa-solid fa-eye" bgColor="bg-teal-600" hoverBgColor="bg-teal-500"/>
                  <Button icon="fa-solid fa-pen-to-square" bgColor="bg-sky-600" hoverBgColor="bg-sky-500"/>
                  <Button icon="fa-solid fa-trash" bgColor="bg-red-600" hoverBgColor="bg-red-500"/>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
