<template>
    <div>
        <h2>Your current reading list:</h2>
        <nav v-bind:class="[{ hidden: pagination.last_page > 1 }]" aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{ disabled: !pagination.prev_page_url }]" class="page-item">
                    <a class="page-link" href="#" @click="fetchBooks(pagination.prev_page_url)">
                        Previous
                    </a>
                </li>

                <li class="page-item disabled" >
                    <a class="page-link text-dark" href="#">
                        Page {{ pagination.current_page }} of {{ pagination.last_page }}
                    </a>
                </li>    

                <li  v-bind:class="[{ disabled: !pagination.next_page_url }]" class="page-item">
                    <a class="page-link" href="#" @click="fetchBooks(pagination.next_page_url)">
                        Next
                     </a>
                </li>
            </ul>
        </nav>
        <div class="card card-body mb-3" v-for="book in books" v-bind:key="book.id">
            <h3>{{book.title}}</h3>
            <h5>By: {{book.author}}</h5>
            <p>Published: {{book.pub_date}}</p>
            <hr>
            <button @click="deleteBook(book.id)" class="btn btn-danger">Delete</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: [],
                book: {
                    id: '',
                    title: '',
                    author: '',
                    pub_date: ''
                }, 
                // pass book_id in because update route needs it
                book_id: '',
                pagination: {},
                edit: false
            }
        },

        created() {
            this.fetchBooks();
        },

        methods: {
            fetchBooks(page_url) {
                let globContext = this;
                page_url = page_url || '/api/books';
                fetch(page_url)
                    .then(response => response.json())
                    .then(res => {
                        this.books = res.data;
                        globContext.makePagination(res.meta, res.links);
                    })
                    .catch(error => console.log(error))
            },

            makePagination(meta, links) {
                let pagination = {
                    current_page: meta.current_page,
                    last_page: meta.last_page,
                    first_page: meta.first_page,
                    next_page_url: links.next,
                    prev_page_url: links.prev
                }

                this.pagination = pagination;
            },
            
            deleteBook(id) {
                if(confirm('Are you sure you want to remove this book?')) {
                    fetch(`api/book/${id}`, {method: 'delete'})
                        .then(response => response.json())
                        .then(data => {
                            alert('Removed book from your list');
                            this.fetchBooks();
                        })
                        .catch(error => console.log(error))
                }
            }
        }
    };
</script>

