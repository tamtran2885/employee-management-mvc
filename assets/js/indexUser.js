const ENDPOINT = document.getElementById("navBar").dataset["base_url"] + "user";

$("#jsGridUser").jsGrid({
  autoload: true,
  width: "100%",
  height: "600px",
  inserting: true,
  editing: true,
  sorting: true,
  paging: true,
  pageSize: 10,
  pageButtonCount: 5,
  deleteConfirm: "Do you really want to delete data?",
  controller: {
    loadData: () =>
      fetch(ENDPOINT + "/getUsers", {
        headers: {
          "X-Requested-With": "XMLHttpRequest",
        },
      }).then((response) => response.json()),
    insertItem: (item) =>
      fetch(ENDPOINT + "/createUser", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),

    updateItem: (item) =>
      fetch(ENDPOINT + "/updateUser", {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),

    deleteItem: (item) =>
      fetch(ENDPOINT + "/deleteUser", {
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify(item),
      }).then((response) => response.json()),
  },
  fields: [
    {
      name: "userId",
      title: "UserID",
      type: "hidden",
      css: "hide",
      width: 50,
      visible: false,
    },
    {
      name: "name",
      title: "Name",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 50,
      validate: "required",
    },
    {
      name: "email",
      title: "Email",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 50,
      validate: "required",
    },
    {
      name: "password",
      title: "Password",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 110,
      validate: "required",
      editing: false,
    },
    {
      name: "role",
      title: "Role",
      type: "text",
      headercss: "table__header",
      css: "table__row",
      width: 40,
      validate: "required",
    },
    {
      type: "control",
      headercss: "table__header",
      css: "table__row",
      editButton: true,
      deleteButton: true,
      editButtonTooltip: "Edit",
      deleteButtonTooltip: "Delete",
      updateButtonTooltip: "Update",
      cancelEditButtonTooltip: "Cancel edit",
    },
  ],
  rowClick: (args) => {
    location.href = `${ENDPOINT}/showEmployeeById/${args.item.id}`;
  },
  onItemUpdated: function () {
    let toast = document.getElementById("update-toast");
    toast.classList.remove("toast");
    setTimeout(() => {
      toast.classList.add("toast");
    }, 2000);
  },
  onItemDeleted: function () {
    let toast = document.getElementById("delete-toast");
    toast.classList.remove("toast");
    setTimeout(() => {
      toast.classList.add("toast");
    }, 2000);
  },
});

$("#jsGridUser").jsGrid("fieldOption", "id", "visible", false);

let toast = document.getElementById("toast");
if (toast) {
  setTimeout(() => {
    toast.remove();
  }, 3000);
}
