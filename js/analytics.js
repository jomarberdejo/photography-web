
const totalUsersContainer = document.getElementById('total-users')
const allUsersContainer = document.getElementById('all-users')
const totalPhotosContainer = document.getElementById('total-photos')

const displayTotalUsers = (data) => {
    totalUsersContainer.innerHTML =  data;
}
const displayAllUsers = (data) => {
    const users = data?.map(user => {
        return `
        <tr>
      <th>${user.user_id}</th>
      <td>${user.username}</td>
      <td>${user.email}</td>
      <td>${user.created_at}</td>
      <td> <button type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button> <button onclick= 'handleDeleteUser(${user.user_id})' type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button> </td>
    </tr
        `
    })
    
    allUsersContainer.innerHTML = users.join('');

    console.log(allUsersContainer)
}
const getPhotosAnalytics = async () => {
    const result = await fetch('http://localhost/jerson/api/analytics?query=photos');

    const data = await result.json();
    console.log(data)
    totalPhotosContainer.innerHTML = data.total_photos;
}



const getUsersAnalytics = async () => {
    const result = await fetch('http://localhost/jerson/api/analytics?query=users');

    const data = await result.json();
    console.log(data);
    displayTotalUsers(data.total_users)

    displayAllUsers(data.users_data)

    if (DataTable){
        DataTable.destroy();
    }

    new DataTable('#example', {
        columnDefs: [
            {
                targets: 3,
                render: DataTable.render.datetime('LLL')
            }
        ],
        // pageLength: 10,
    });
   
}

const handleDeleteUser = async(id) => {
    const result = await fetch(`http://localhost/jerson/api/users?id=${id}`, {
        method: "DELETE",
    });

    const data = await result.json();
    getUsersAnalytics();
    
}

window.addEventListener('DOMContentLoaded', ()=> {
    getUsersAnalytics();
    getPhotosAnalytics();
})