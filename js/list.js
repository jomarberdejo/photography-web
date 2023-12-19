const listContainer = document.getElementById('list-container');
const searchInput = document.getElementById('search-input');
const toastContainer = document.getElementById('toast')

const displayImages = async (photos) => {
    if (photos.message == "No match results found"){
        listContainer.innerHTML =  `<div class= "_not-found"> 
        <h3 class= "text-center mt-4"> No results found </h3>
        <a class= " text-center p-1" href= ""> Go Back </a>
        </div>
        `;
        return;
    }
    
    
    const items = photos?.map(photo => {
        return `<div class="col-lg-4 my-2">
                    <div class="card">
                        <img src="./assets/images/${photo?.url}" class="card-img-top" alt="${photo.url}">
                        <div class="card-body">
                            <h5 class="card-title">${photo?.name}</h5>
                            <p class="card-text">${photo?.description}</p>
                            <button onClick="handleSave(${photo.photo_id})" ${photo.isSaved == 1 ? 'disabled' : ''} class="btn btn-primary">Add To Favorites.</button>

                           

                        </div>
                    </div>
                </div>`;
    });

    listContainer.innerHTML = items.join('');
}

const fetchImages = async () => {
    const response = await fetch('http://localhost/jerson/api/photo');
    const data = await response.json();
    
    displayImages(data);
}

const handleSearch = async (e) => {
    e.preventDefault();
    const searchQuery = searchInput.value;
    if (searchQuery === ""){
        fetchImages();
        return;
    }
    const response = await fetch(
        `http://localhost/jerson/api/photo?search_query1=${searchQuery}`,
        {
            method: "GET",
            headers: {
                'Content-Type': 'application/json',
            },
            
        }
    );

    const data = await response.json();
    displayImages(data);
}





const handleSave = async (id) => {
    try {
        const response = await fetch(
            `http://localhost/jerson/api/photo?photo_id=${id}`,
            {
                method: "PATCH",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'save', 
                }),
            }
        );

        const data = await response.json();
        console.log(data)
        fetchImages()
        // alert(data.message)
        
    } catch (error) {
        console.error('Error:', error);
    }
}






document.addEventListener('DOMContentLoaded', fetchImages);
