<template>
    <div class="container">
        {{trialData}}
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'TrialByNCt',
        data () {
            return {
                NCT: 'NCT01841944',
                trialData: []
            }
        },
        mounted () {
            axios.get('https://clinicaltrials.gov/api/query/full_studies?expr=' + this.NCT + '&max_rnk=1&fmt=JSON')
                .then(response => {
                    this.trialData = response.data
                })
        }
    }
</script>
