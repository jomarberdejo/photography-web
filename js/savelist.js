const saveListContainer = document.getElementById('save-list-container');

const searchInput = document.getElementById('search-input');


const handleSearch = async (e) => {
    e.preventDefault();
    const searchQuery = searchInput.value;

    if (searchQuery === ""){
        return;
    }

    const response = await fetch(
        `http://localhost/jerson/api/photo?search_query2=${searchQuery}`,
        {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
            },
            
        }
    );

    const data = await response.json();

   

    displayImages(data);
     // alert(data.message)
}


const fetchImages = async () => {
    const response = await fetch('http://localhost/jerson/api/photo');

    const data = await response.json();

    const filteredData = data.filter(photo =>  photo.isSaved == 1);

    displayImages(filteredData);

}
const handleRemove = async (id) => {
    try {
        const response = await fetch(
            `http://localhost/jerson/api/photo?photo_id=${id}`,
            {
                method: "PATCH",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'remove', 
                }),
            }
        );

        const data = await response.json();
        console.log(data)
       
        fetchImages();
        

    } catch (error) {
        console.error('Error:', error);
    }
}


const displayImages = async (photos) => {
    
    if (photos.message == "No match results found"){
        saveListContainer.innerHTML = `<div class= "_not-found"> 
        <h3 class= "text-center mt-4"> No results found </h3>
        <a class= " text-center p-1" href= ""> Go Back </a>
        </div>
        `;
        return;
    }

    const items = photos?.length > 0
    ? photos.map(photo => {
        return `<div class="col-lg-4 my-2">
                    <div class="card">
                        <img src="./assets/images/${photo?.url}" class="card-img-top" alt="${photo.url}">
                        <div class="card-body">
                            <h5 class="card-title">${photo?.name}</h5>
                            <p class="card-text">${photo?.description}</p>
                            <button onClick="handleRemove(${photo.photo_id})" class="btn btn-danger">Remove to Favorites.</button>
                        </div>
                    </div>
                </div>`;
    })
    : [`<h4 class="col-12 text-center mt-4  ">No favorites found.</h4>
            <a class= "p-1 col-12 text-center" href= "./index.php"> Add One</a>
    `];

    saveListContainer.innerHTML = items.join('');

 
}

document.addEventListener('DOMContentLoaded', fetchImages)