<template>

    <div class="grid-x grid-margin-x grid-margin-y hero">
        <div class="cell medium-12 large-4 padding-top-3">
            <h1 class="margin-bottom-2">Patient Screening</h1>
            <div class="bg-white border-radius padding-2">
                <div class="basic-trial-info">
                    <p v-if="trialsFound > 0" class="strong">{{ trialData.BriefTitle }}</p>
                    <p v-if="ncit" class="margin-bottom-2 em">NCIT Number: <a
                        :href="'https://clinicaltrials.gov/ct2/show/'+ncit"
                        target="_blank">{{ncit}}</a></p>
                    <ul class="stepper">
                        <li :class="currentStep===1 ? 'current' : ''">Basic Questions</li>
                        <li v-if="questions.length > 0" :class="currentStep===2 ? 'current' : ''">Trial Specific Questions</li>
                        <li :class="currentStep===3 ? 'current' : ''">Contact Information</li>
                        <li :class="submitted ? 'current' : ''">Complete</li>
                    </ul>
                    <p class="padding-vertical-3"><em>* screening online does not guarantee entry into a clinical
                        trial</em></p>
                </div>
            </div>
        </div>
        <div class="cell medium-12 large-8 form-container bg-tertiary border-radius padding-2">
            <form v-if="!submitted">
                <transition name="fade">
                    <div v-show="currentStep===1" class="bg-tertiary border-radius padding-2 form">
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
                    <div v-show="currentStep===2" class="bg-tertiary border-radius padding-2 form">
                        <h2 class="margin-bottom-2">Trial Specific Questions:</h2>
                        <div class="grid-x grid-margin-x grid-margin-y">
                            <div class="cell medium-12" v-for="(question, index) in questions" :key="index">
                                <label>{{question.question}}<br><br>
                                    <template v-if="question.question_type === 'text'">
                                        <input type="text" :name="'question'+index" required/>
                                    </template>
                                    <template v-if="question.question_type === 'paragraph'">
                                        <textarea :name="'question'+index" required></textarea>
                                    </template>
                                    <template v-if="question.question_type === 'boolean'">
                                        <fieldset>
                                            <legend class="hide-ally-element">{{question.question}}</legend>
                                            <input type="radio" :id="'question'+index+'yes'" :name="'question'+index"
                                                   value="yes" checked>
                                            <label :for="'question'+index+'yes'">Yes</label>
                                            <input type="radio" :id="'question'+index+'no'" :name="'question'+index"
                                                   value="no">
                                            <label :for="'question'+index+'no'">No</label>
                                        </fieldset>
                                    </template>
                                </label>
                            </div>
                            <div class="cell medium-12">
                                <a class="button" tabindex="0" @click="goBack">go back</a>
                                <a class="button" tabindex="0" @click="goAhead">continue</a>
                            </div>
                        </div>
                    </div>
                </transition>
                <transition name="fade">
                    <div v-show="currentStep===3" class="bg-tertiary border-radius padding-2 form">
                        <h2 class="margin-bottom-2">Contact Information:</h2>
                        <form method="POST" action="/register">
                            <div class="grid-x grid-margin-x grid-margin-y">
                                <div class="cell medium-12">
                                    <label for="name">Your Name:</label> <input type="text" id="name">
                                </div>
                                <div class="cell medium-12">
                                    <label for="patientname">Patient's Name (if you are filling this out on behalf of
                                        someone else):</label> <input type="text" id="patientname">
                                </div>
                                <div class="cell large-6 medium-12">
                                    <label for="email">Email Address:</label> <input type="email" id="email">
                                </div>
                                <div class="cell large-6 medium-12">
                                    <label for="phone">Phone Number:</label> <input type="number" id="phone">
                                </div>
                                <div class="cell large-12 medium-12">
                                    <p>Do you want to sign up for clinical trial alerts?</p>
                                    <fieldset>
                                        <legend class="hide-ally-element">Sign up for clinical trial alerts:</legend>
                                        <input type="radio" id="subscribe-yes" name="subscribe" value="1" checked>
                                        <label for="subscribe-yes">Yes</label>
                                        <input type="radio" id="subscribe-no" name="subscribe" value="0">
                                        <label for="subscribe-no">No</label>
                                    </fieldset>
                                </div>
                                <div class="cell large-12 medium-12">
                                    <a class="button" tabindex="0" @click="goBack">go back</a>
                                    <button type="submit" class="button" @click.prevent="submitForm">save & submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </transition>
            </form>
            <div v-else>
                <h6>Thank you!</h6>
                <p>Your screening has been successfully submitted.</p>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'Screen',
        data () {
            return {
                trialData: [],
                currentStep: 1,
                trialsFound: 0,
                questions: [],
                submitted: false
            }
        },
        props: {
            ncit: {
                type: String,
                default: null
            }
        },
        mounted () {
            if (this.ncit) {
                axios.get('https://clinicaltrials.gov/api/query/full_studies?expr=' + this.ncit + '&max_rnk=1&fmt=JSON')
                    .then(response => {
                        this.trialsFound = response.data.FullStudiesResponse.NStudiesFound,
                            this.trialData = response.data.FullStudiesResponse.FullStudies[0].Study.ProtocolSection.IdentificationModule
                    })
                    .catch(function (error) {
                        console.log(error)
                    }),
                    this.getQuestions()
            }
        },
        methods: {
            getQuestions () {
                axios.get('/api/trial-questions/' + this.ncit)
                    .then(response => (
                        this.questions = response.data
                    ))
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            goAhead () {
                if (this.currentStep === 1 && this.questions.length > 0) {
                    this.currentStep = 2
                } else {
                    this.currentStep = 3
                }
            },
            goBack () {
                if (this.currentStep === 3 && this.questions.length > 0) {
                    this.currentStep = 2
                } else {
                    this.currentStep = 1
                }
            },
            submitForm () {
                console.log('submitForm')
                this.submitted = true
                this.currentStep = 4
            }
        }
    }
</script>

<style lang="scss">
    @import "resources/sass/variables";

    .screen {
        position: relative;
        background: url("/images/screen-hero.png") no-repeat top left;

        // form

        input,
        textarea {
            border: 1px solid transparent;
            margin: 0;
        }

        //vertical stepper

        $background: $white;
        $color: $black;
        $current: $secondary;
        $done: $primary;
        $inactive: $light-gray;
        $icon-size: 2rem;

        .stepper {
            position: relative;
            list-style: none;
            margin: 0;
            padding: 0;

            &::before {
                display: inline-block;
                content: "";
                position: absolute;
                top: 0;
                left: $icon-size/2;
                width: 1px;
                height: 100%;
                border-left: 1px solid $inactive;
            }

            li {
                position: relative;
                counter-increment: list;
                padding-left: $icon-size + 1rem;
                line-height: $icon-size;
                color: $inactive;

                &:not(:last-child) {
                    padding-bottom: 20px;
                }

                &::after {
                    display: inline-block;
                    position: absolute;
                    top: 0;
                    left: 0;
                    content: "\f192";
                    font-family: $font-awesome;
                    font-weight: 900;
                    font-size: 2rem;
                    color: $inactive;
                    text-align: center;
                    background: $background;
                }

                &.done {
                    color: $color;

                    &::after {
                        content: "\f058";
                        color: $done;
                    }
                }

                &.current {
                    font-weight: 700;
                    color: $color;

                    &::after {
                        color: $current;
                    }
                }
            }
        }

        .cell {
            position: relative;
        }
    }
</style>
