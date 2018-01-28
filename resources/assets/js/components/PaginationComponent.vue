<template>
    <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
        <a class="pagination-previous" @click="changePage(pagination.current_page - 1)" :disabled="pagination.current_page <= 1">Previous</a>
        <a class="pagination-previous" @click="changePage(1)">First page</a>
        <a class="pagination-next" @click="changePage(pagination.last_page)">Last page</a>
        <a class="pagination-next" @click="changePage(pagination.current_page + 1)" :disabled="pagination.current_page >= pagination.last_page">Next page</a>
        <ul class="pagination-list">
            <li v-for="page in pages">
                <a class="pagination-link" :class="isCurrentPage(page) ? 'is-current' : ''" @click="changePage(page)">{{ page }}</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: ['pagination'],

        data() {
            return {
                offset: 2
            }
        },

        methods: {
            isCurrentPage(page) {
                return this.pagination.current_page === page;
            },

            changePage(page) {
                this.$emit('newpage', page);
            }
        },

        computed: {
            pages() {
                if (!this.pagination.to) {
                    return [];
                }

                let pages = [];

                for (let i = this.pagination.current_page - this.offset; i <= this.pagination.current_page + this.offset; i++) {
                    if (i < 1 || i > this.pagination.last_page) {
                        continue;
                    }
                    pages.push(i);
                }

                return pages;
            }
        }
    }
</script>
