<template>

    <div class="grid-x grid-margin-x grid-margin-y hero">
        <div class="cell medium-12 large-4 padding-top-3">
            <h1 class="margin-bottom-2">Patient Screening</h1>
            <div class="bg-white border-radius padding-2">
                <div class="basic-trial-info">
                    <template v-if="nct">
                        <p class="strong">{{ trialData.BriefTitle }}</p>
                        <p class="margin-bottom-2 em">NCIT Number: <a :href="'https://clinicaltrials.gov/ct2/show/'+nct"
                                                                      target="_blank">{{nct}}</a></p>
                        <ul class="stepper">
                            <li :class="currentStep===1 ? 'current' : ''">Basic Information</li>
                            <li :class="currentStep===2 ? 'current' : ''">Trial Specific Questions</li>
                            <li :class="currentStep===3 ? 'current' : ''">Create An Account</li>
                        </ul>
                    </template>
                    <template v-else>
                        <ul class="stepper">
                            <li :class="currentStep===1 ? 'current' : ''">Basic Information</li>
                            <li :class="currentStep===3 ? 'current' : ''">Create An Account</li>
                        </ul>
                    </template>
                </div>
            </div>
        </div>
        <div class="cell medium-12 large-8 bg-tertiary border-radius padding-2">
            <transition name="fade">
                <div v-show="currentStep===1" class="form-container">
                    <h2 class="margin-bottom-2">Basic Information:</h2>
                    <div class="grid-x grid-margin-x grid-margin-y">
                        <div class="cell medium-4">
                            <p>How old are you?</p>
                            <input type="number" id="age" min="1" max="120" required>
                            <label for="age" class="hide-ally-element">Age</label>
                        </div>
                        <div class="cell medium-4">
                            <p>Select your gender:</p>
                            <fieldset>
                                <legend class="hide-ally-element">Select your gender:</legend>
                                <input type="radio" id="gender-male" name="gender" value="male" checked>
                                <label for="gender-male">Male</label>
                                <input type="radio" id="gender-female" name="gender" value="female">
                                <label for="gender-female">Female</label>
                            </fieldset>
                        </div>
                        <div class="cell medium-4">
                            <p>Are you a smoker?</p>
                            <fieldset>
                                <legend class="hide-ally-element">Are you a smoker?</legend>
                                <input type="radio" id="smoker-yes" name="smoker" value="yes">
                                <label for="smoker-yes">Yes</label>
                                <input type="radio" id="smoker-no" name="smoker" value="no" checked>
                                <label for="smoker-no">No</label>
                            </fieldset>
                        </div>
                        <div class="cell medium-4">
                            <p>What's your zip code?</p>
                            <label for="zip" class="hide-ally-element">enter your zip code</label>
                            <input type="number" id="zip" min="11111" max="99999" required>
                        </div>
                        <div class="cell medium-8">
                            <p>How far are you willing to travel?</p>
                            <fieldset>
                                <legend class="hide-ally-element">How far are you willing to travel?</legend>
                                <input type="radio" id="distance-20" name="distance" value="20" checked>
                                <label for="distance-20">20 Miles</label>
                                <input type="radio" id="distance-50" name="distance" value="50">
                                <label for="distance-50">50 Miles</label>
                                <input type="radio" id="distance-100" name="distance" value="100">
                                <label for="distance-100">100 Miles</label>
                                <input type="radio" id="distance-any" name="distance" value="any">
                                <label for="distance-any">Any</label>
                            </fieldset>
                        </div>
                        <div class="cell medium-12">
                            <p>Do you have any underlying conditions?</p>
                            <label for="underlying-conditions" class="hide-ally-element">Do you have any underlying
                                conditions?</label>
                            <textarea id="underlying-conditions"
                                      placeholder="heart issues, cancer, diabetes, etc."></textarea>
                        </div>
                        <div class="cell medium-12">
                            <a class="button" tabindex="0" @click="goAhead">continue</a>
                        </div>
                    </div>
                </div>
            </transition>
            <transition name="fade">
                <div v-show="currentStep===2" class="form-container">
                    <h2 class="margin-bottom-2">Trial Specific Questions:</h2>
                    <div class="grid-x grid-margin-x grid-margin-y">
                        <div class="cell medium-12">
                            <label for="custom1">Custom question one:</label> <input type="number" id="custom1">
                        </div>
                        <div class="cell medium-12">
                            <label for="custom2">Custom question two:</label>
                            <textarea id="custom2"></textarea>
                        </div>
                        <div class="cell medium-12">
                            <a class="button" tabindex="0" @click="goBack">go back</a>
                            <a class="button" tabindex="0" @click="goAhead">continue</a>
                        </div>
                    </div>
                </div>
            </transition>
            <transition name="fade">
                <div v-show="currentStep===3" class="form-container">
                    <h2 class="margin-bottom-2">Create An Account:</h2>
                    <form method="POST" action="/register">
                        <div class="grid-x grid-margin-x grid-margin-y">
                            <div class="cell large-6">
                                <label for="name">Name</label> <input type="text" id="name">
                            </div>
                            <div class="cell large-6">
                                <label for="email">Email</label> <input type="email" id="email">
                            </div>
                            <div class="cell medium-12">
                                <label for="phone">Phone Number</label> <input type="number" id="phone">
                            </div>
                            <div class="cell medium-12">
                                <label for="password">Password</label> <input type="password" id="password">
                            </div>
                            <div class="cell medium-12">
                                <a class="button" tabindex="0" @click="goBack">go back</a>
                                <a class="button" tabindex="0">save & finish</a>
                            </div>
                        </div>
                    </form>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'BasicTrialInfo',
        data () {
            return {
                trialData: [],
                currentStep: 1
            }
        },
        props: {
            nct: String
        },
        mounted () {
            axios.get('https://clinicaltrials.gov/api/query/full_studies?expr=' + this.nct + '&max_rnk=1&fmt=JSON')
                .then(response => {
                    this.trialData = response.data.FullStudiesResponse.FullStudies[0].Study.ProtocolSection.IdentificationModule
                })
        },
        methods: {
            goAhead () {
                if (this.currentStep === 1 && this.nct) {
                    this.currentStep = 2
                } else {
                    this.currentStep = 3
                }
            },
            goBack () {
                if (this.currentStep === 3 && this.nct) {
                    this.currentStep = 2
                } else {
                    this.currentStep = 1
                }
            }
        }
    }
</script>
