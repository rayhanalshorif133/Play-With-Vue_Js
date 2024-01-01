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
      selectedUsers: [],
      isCheckedAll: false /* I want to use this variable to check if all the checkboxes are checked */,
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
    handleDeleteItem(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.users = this.users.filter((user) => user.id !== id);
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Cancelled!",
            text: "Your file is safe.",
            icon: "error",
          });
        }
      });
    },
    handleSelectItem(selected) {
      const { id } = selected.target.dataset;
      const isSelected = selected.target.checked;
      if (isSelected) {
        const isAdded = this.selectedUsers.includes(parseInt(id));
        if (isAdded) return;
        this.selectedUsers.push(parseInt(id));
      } else {
        this.selectedUsers.splice(this.selectedUsers.indexOf(parseInt(id)), 1);
      }
      this.handleIsAllChecked();
    },
    handleSelectAll(selected) {
      const isSelected = selected.target.checked;
      if (isSelected) {
        this.selectedUsers = this.users.map((user) => user.id);
      } else {
        this.selectedUsers = [];
      }
      this.handleIsAllChecked();
    },
    handleIsAllChecked() {
      if (this.selectedUsers.length > 0) {
        const isCheckAll = this.selectedUsers.length === this.users.length;
        isCheckAll ? (this.isCheckedAll = true) : (this.isCheckedAll = false);
      }
    },
    handleAllDeleteItem(userIds) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          userIds.forEach((id) => {
            this.users = this.users.filter((user) => user.id !== id);
          });
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Cancelled!",
            text: "Your file is safe.",
            icon: "error",
          });
        }
      });
    },
  },
  mounted() {
    this.fetchUser();
    this.handleIsAllChecked();
  },
};
</script>

<template>
  <div>
    <Header title="User" />
    <div class="w-fit mx-auto justify-center">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="absolute top-0 right-0 px-6 py-4">
          <Button
            icon="fa-solid fa-trash mx-2"
            bgColor="bg-red-600"
            hoverBgColor="bg-red-500"
            title="Delete All"
            @click="handleAllDeleteItem(selectedUsers)"
            v-if="selectedUsers.length > 0"
          />
        </div>
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
          <caption
            class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800"
          >
            <div class="space-x-2">
              <span class="text-gray-900 dark:text-white">User List</span>
              <span class="text-gray-500 dark:text-gray-400"
                >({{ users.length }})</span
              >
            </div>
          </caption>
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="px-6 py-3">
                <input
                  :onChange="handleSelectAll"
                  :checked="isCheckedAll"
                  type="checkbox"
                  class="form-checkbox h-4 w-4 cursor-pointer text-indigo-600 transition duration-300 ease-in-out"
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
              v-for="(user, index) in this.users"
              :key="index"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            >
              <th
                scope="row"
                class="px-6 py-4 whitespace-nowrap text-sm font-medium cursor-pointer text-gray-900 dark:text-white"
              >
                <input
                  :data-id="user.id"
                  :onChange="handleSelectItem"
                  :checked="selectedUsers.includes(user.id)"
                  type="checkbox"
                  class="form-checkbox cursor-pointer h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                />
              </th>
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ index + 1 }}
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
                  <Button
                    icon="fa-solid fa-eye"
                    bgColor="bg-teal-600"
                    hoverBgColor="bg-teal-500"
                  />
                  <Button
                    icon="fa-solid fa-pen-to-square"
                    bgColor="bg-sky-600"
                    hoverBgColor="bg-sky-500"
                  />
                  <Button
                    @click="handleDeleteItem(user.id)"
                    icon="fa-solid fa-trash"
                    bgColor="bg-red-600"
                    hoverBgColor="bg-red-500"
                  />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
