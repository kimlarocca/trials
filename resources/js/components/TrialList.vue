<template>
    <div class="grid-x grid-margin-x grid-margin-y">
        <div class="cell medium-12 large-12">
            <div v-if="myTrials.length > 0" v-for="(trial, index) in myTrials" :key="index">
                <div class="grid-x bg-white border-radius align-middle trial">
                    <div class="cell large-11">
                        <strong>{{trial.id}} {{trial.ncit}}:</strong> {{trial.title}}
                    </div>
                    <div class="cell large-1 text-right"><i @click="deleteTrial(trial)" class="fas fa-trash"></i></div>
                </div>
            </div>
            <p v-else>You don't have any trials added yet. Use the form on your right to import your trial!</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'TrialList',
        data () {
            return {
                myTrials: [],
                userID: null
            }
        },
        mounted () {
            this.userID = document.querySelector("meta[name='user-id']").getAttribute('content')
            axios.get('/api/trials')
                .then(response => (
                    this.myTrials = response.data,
                        //sort myTrials array by ncit
                        this.myTrials.sort((a, b) => (a.ncit > b.ncit) ? 1 : -1)
                ))
                .catch(function (error) {
                    console.log(error)
                })
        },
        methods: {
            deleteTrial (trial) {
                axios
                    .delete('/api/trials/' + trial.id)
                    .then(
                        //remove from myTrials array
                        this.myTrials = this.myTrials.filter(item => item !== trial)
                    )
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>

<style lang="scss">
    @import 'resources/sass/variables';

    .trial {
        width: 100%;

        i {
            font-size: 1.5rem;
            cursor: pointer;
            transition: $transition;

            &:hover {
                color: $secondary;
            }
        }
    }
</style>
