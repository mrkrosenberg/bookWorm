<template>
    <div>
<!-- Book Form -->
        <h2>Add/Edit Books in Your List</h2>
        <form @submit.prevent="addBook" class="mb-5" >
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" v-model="book.title" maxlength="49">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Author" v-model="book.author">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Publication Date" v-model="book.pub_date">
            </div>
            <button type="submit" class="btn btn-light btn-block mb-3">Save Book</button>
        </form>

<!-- Pagination Navigation -->
    <h2>Reading List:</h2>
        <!-- <nav  aria-label="Page navigation example">
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
        </nav> -->

<!-- Reading List -->
        <!-- <div class="card card-body mb-3" v-for="book in books" v-bind:key="book.id">
            <h3>{{book.title}}</h3>
            <h5>By: {{book.author}}</h5>
            <p>Published: {{book.pub_date}}</p>
            <hr>
            <button @click="editBook(book)" class="btn btn-warning">Edit Book</button>
            <button @click="deleteBook(book.id)" class="btn btn-danger">Delete Book</button>
        </div> -->

    <div class="items">
        <div class="item" v-for="book in books" v-bind:key="book.id" >
            <div class="title">
                <h3>
                    {{book.title}}
                </h3>
                <p>{{book.author}}</p>
                <br>
                <button @click="deleteBook(book.id)" class="btn btn-danger">Delete Book</button>
                <button @click="editBook(book)" class="btn btn-warning">Edit Book</button>
            </div>
        </div>
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
            },

            addBook() {
                if(this.edit === false) {
                    // adds new book
                    fetch('api/book', {
                        method: 'post',
                        body: JSON.stringify(this.book),
                        headers: {
                            'content-type' : 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.book.title = '';
                        this.book.author = '';
                        this.book.pub_date = '';
                        alert('Book added to your list');
                        this.fetchBooks();
                    })
                    .catch();
                } else {
                    // updates existing book
                        fetch('api/book', {
                        method: 'put',
                        body: JSON.stringify(this.book),
                        headers: {
                            'content-type' : 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.book.title = '';
                        this.book.author = '';
                        this.book.pub_date = '';
                        alert('The book has been updated');
                        this.fetchBooks();
                    })
                    .catch();
                }
            },

            editBook(book) {
                this.edit = true;
                this.book.id = book.id;
                this.book.book_id = book.id;
                this.book.title = book.title;
                this.book.author = book.author;
                this.book.pub_date = book.pub_date;
            }
        }
    };

</script>

<style scoped>

    .items {
        height: 800px;
        padding: 100px;
        width: 100%;
        border: 1px solid white;
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        user-select: none;
        cursor: pointer;
        transition: all 0.2s;
        transform: scale(0.98);
        will-change: transform;
        position: relative;
        background: rgba(255, 255, 255, 0.1);
        font-size: 0;
        perspective: 500px;
    }

    .item {
        width: 600px;
        height: calc(100% - 40px);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 80px;
        font-weight: 100;
        color: rgba(0, 0, 0, 1);
        box-shadow: inset 0 0 0 10px rgba(0, 0, 0, 0.15);
    }

    .title {
        font-size: 20px;
        width: 100%;
        text-align: center;
    }

    .item:nth-child(9n+1) {
        background: dodgerblue;
    }

    .item:nth-child(9n+2) {
        background: goldenrod;
    }

    .item:nth-child(9n+3) {
        background: paleturquoise;
    }

    .item:nth-child(9n+4) {
        background: gold;
    }

    .item:nth-child(9n+5) {
        background: cadetblue;
    }

    .item:nth-child(9n+6) {
        background: tomato;
    }

    .item:nth-child(9n+7) {
        background: lightcoral;
    }

    .item:nth-child(9n+8) {
        background: darkslateblue;
    }

    .item:nth-child(9n+9) {
        background: rebeccapurple;
    }

    .item:nth-child(even) {
        transform: scaleX(1) rotateY(10deg);
    }

    .item:nth-child(odd) {
        transform: scaleX(1) rotateY(-10deg);
    }
</style>


