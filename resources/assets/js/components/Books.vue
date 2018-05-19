<template>
    <div>
        <h2>Books</h2>
        <div class="card card-body" v-for="book in books" v-bind:key="book.id">
            <h3>{{book.title}}</h3>
            <h4>By: {{book.author}}</h4>
            <p>Published: {{book.pub_date}}</p>
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
            fetchBooks() {
                fetch('api/books')
                    .then(response => response.json())
                    .then(res => {
                        this.books = res.data;
                    })
            }
        }

    }
</script>

