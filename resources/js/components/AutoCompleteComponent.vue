<template>
    <div>
        <input type="text" v-model="keyword">
        <ul v-if="Reports.length > 0">
            <li v-for="report in Reports" :key="report.id" v-text="report.name"></li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keyword: null,
            Report: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.Reports = res.data)
                .catch(error => {});
        }
    }
}
</script>