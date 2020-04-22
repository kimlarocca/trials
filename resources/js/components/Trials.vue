<template>
    <div class="grid-x grid-margin-x grid-margin-y">
        <div class="cell medium-12 large-8">
            <div v-for="(trial, index) in myTrials" :key="index">
                <trial :ncit="trial.ncit" :title="trial.title"></trial>
            </div>
            <p v-if="componentMounted && myTrials.length === 0">You don't have any trials added yet. Use the form on
                your right to import
                your trial!</p>
            <template v-if="!componentMounted">
                <loader></loader>
            </template>
        </div>
        <div class="cell medium-12 large-4">
            <div class="bg-tertiary border-radius padding-2">
                <p v-if="trialAdded">Your trial has been added!</p>
                <h4>Import A New Trial</h4>
                <p>Enter your NCIT here:</p>
                <label for="ncit" class="hide-ally-element">NCIT</label>
                <input type="text" v-model="ncit" id="ncit">
                <a class="button" tabindex="0" @click="findNCIT">search</a>
                <p class="margin-top-1" v-if="!possibleTrials && noResultsFound">No results found! Please try your search again.</p>
                <template v-if="possibleTrials">
                    <p class="margin-top-1"><strong>Is this the right one?</strong></p>
                    <p>NCT Id: {{possibleTrials.NCTId}}</p>
                    <p>{{possibleTrials.BriefTitle}}</p>
                    <a class="button" tabindex="0" @click="importTrial">Yes, Import it!</a>
                    <p class="margin-top-1"><strong>Not the right one?</strong> Please try your search again.</p>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'Trials',
        data () {
            return {
                ncit: '',
                trialsKey: 0,
                myTrials: [],
                possibleTrials: null,
                userID: null,
                trialAdded: false,
                noResultsFound: false,
                componentMounted: false
            }
        },
        mounted () {
            this.userID = document.querySelector("meta[name='user-id']").getAttribute('content')
            this.getTrials()
        },
        methods: {
            getTrials () {
                axios.get('/api/trials')
                    .then(response => (
                        this.myTrials = response.data,
                            //filter by user id
                            this.myTrials = this.myTrials.filter(trial => {
                                return trial.user_id === this.userID
                            }),
                            //sort myTrials array by ncit
                            this.myTrials.sort((a, b) => (a.ncit > b.ncit) ? 1 : -1),
                            this.componentMounted = true
                    ))
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            findNCIT () {
                axios.get('https://clinicaltrials.gov/api/query/full_studies?expr=' + this.ncit + '&max_rnk=1&fmt=JSON')
                    .then(response => {
                        this.possibleTrials = response.data.FullStudiesResponse.FullStudies[0].Study.ProtocolSection.IdentificationModule
                    })
                if (this.possibleTrials === null) this.noResultsFound = true
            },
            importTrial () {
                this.trialAdded = false
                this.noResultsFound = false
                axios
                    .post('/api/trials/', {
                        user_id: this.userID,
                        ncit: this.possibleTrials.NCTId,
                        title: this.possibleTrials.BriefTitle
                    })
                    .then(response => (
                        console.log('added ' + response),
                            this.possibleTrials = null,
                            this.trialAdded = true,
                            this.getTrials()
                    ))
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>
