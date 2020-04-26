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
                        <li v-if="questions.length > 0" :class="currentStep===2 ? 'current' : ''">Trial Specific
                            Questions
                        </li>
                        <li :class="currentStep===3 ? 'current' : ''">Contact Information</li>
                        <li :class="submitted ? 'current' : ''">Complete</li>
                    </ul>
                    <p class="padding-vertical-3"><em>* screening online does not guarantee entry into a clinical
                        trial</em></p>
                </div>
            </div>
        </div>
        <div class="cell medium-12 large-8 form-container bg-tertiary border-radius">
            <form v-if="!submitted">
                <transition name="fade">
                    <div v-show="currentStep===1" class="bg-tertiary border-radius padding-2 form">
                        <h2 class="margin-bottom-2">Basic Information:</h2>
                        <div class="grid-x grid-margin-x grid-margin-y">
                            <div class="cell medium-6 large-4">
                                <p>How old are you?</p>
                                <div class="form-group"
                                     :class="{ 'error': $v.age.$error, 'error': step1ErrorsFound && $v.age.$invalid }">
                                    <label for="age" class="hide-ally-element">Age</label>
                                    <input type="number" id="age" v-model.trim="$v.age.$model"
                                           :class="{ 'error': !$v.age.required }">
                                    <div class="error-text">* age must be a number between 0 and 120</div>
                                </div>
                            </div>
                            <div class="cell medium-6 large-4">
                                <p>Select your gender:</p>
                                <fieldset>
                                    <legend class="hide-ally-element">Select your gender:</legend>
                                    <input type="radio" id="gender-male" name="gender" value="male" v-model="gender">
                                    <label for="gender-male">Male</label>
                                    <input type="radio" id="gender-female" name="gender" value="female" v-model="gender">
                                    <label for="gender-female">Female</label>
                                </fieldset>
                            </div>
                            <div class="cell medium-6 large-4">
                                <p>Are you a smoker?</p>
                                <fieldset>
                                    <legend class="hide-ally-element">Are you a smoker?</legend>
                                    <input type="radio" id="smoker-yes" name="smoker" value="yes" v-model="smoker">
                                    <label for="smoker-yes">Yes</label>
                                    <input type="radio" id="smoker-no" name="smoker" value="no" v-model="smoker">
                                    <label for="smoker-no">No</label>
                                </fieldset>
                            </div>
                            <div class="cell medium-6 large-4">
                                <p>What's your zip code?</p>
                                <div class="form-group"
                                     :class="{ 'error': $v.zip.$error, 'error': step1ErrorsFound && $v.zip.$invalid  }">
                                    <label for="zip" class="hide-ally-element">enter your zip code</label>
                                    <input type="number" id="zip" v-model.trim="$v.zip.$model"
                                           :class="{ 'error': !$v.zip.required }">
                                    <div class="error-text">* zip code must be 5 numbers</div>
                                </div>
                            </div>
                            <div class="cell medium-12 large-8">
                                <p>How far are you willing to travel?</p>
                                <fieldset>
                                    <legend class="hide-ally-element">How far are you willing to travel?</legend>
                                    <input type="radio" id="distance-20" name="distance" value="20" v-model="distance">
                                    <label for="distance-20">20 Miles</label>
                                    <input type="radio" id="distance-50" name="distance" value="50" v-model="distance">
                                    <label for="distance-50">50 Miles</label>
                                    <input type="radio" id="distance-100" name="distance" value="100" v-model="distance">
                                    <label for="distance-100">100 Miles</label>
                                    <input type="radio" id="distance-any" name="distance" value="any" v-model="distance">
                                    <label for="distance-any">Any</label>
                                </fieldset>
                            </div>
                            <div class="cell medium-12">
                                <p>Do you have any underlying conditions?</p>
                                <label for="underlying-conditions" class="hide-ally-element">Do you have any underlying
                                    conditions?</label>
                                <textarea id="underlying-conditions"
                                          placeholder="heart issues, cancer, diabetes, etc." v-model="conditions"></textarea>
                            </div>
                            <div class="cell medium-12">
                                <a class="button" tabindex="0" @click="goAhead">continue</a>
                                <p v-if="step1ErrorsFound" class="error-message">You have a few errors, please fix them
                                    before continuing!</p>
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
                                    <div class="form-group"
                                         :class="{ 'error': $v.name.$error, 'error': step3ErrorsFound && $v.name.$invalid  }">
                                        <label for="name">Your Name:</label>
                                        <input type="text" id="name" v-model.trim="$v.name.$model"
                                               :class="{ 'error': !$v.name.required }">
                                        <div class="error-text">* name is required</div>
                                    </div>
                                </div>
                                <div class="cell medium-12">
                                    <label for="patientname">Patient's Name (if you are filling this out on behalf of
                                        someone else):</label> <input type="text" id="patientname" v-model="patientName">
                                </div>
                                <div class="cell large-6 medium-12">
                                    <div class="form-group"
                                         :class="{ 'error': $v.email.$error, 'error': step3ErrorsFound && $v.email.$invalid  }">
                                        <label for="name">Email Address:</label>
                                        <input type="email" id="email" v-model.trim="$v.email.$model"
                                               :class="{ 'error': !$v.email.required }">
                                        <div class="error-text">* please enter a valid email address</div>
                                    </div>
                                </div>
                                <div class="cell large-6 medium-12">
                                    <label for="phone">Phone Number:</label> <input type="number" id="phone" v-model="phone">
                                </div>
                                <div class="cell large-12 medium-12">
                                    <p>Do you want to sign up for clinical trial alerts?</p>
                                    <fieldset>
                                        <legend class="hide-ally-element">Sign up for clinical trial alerts:</legend>
                                        <input type="radio" id="subscribe-yes" name="subscribe" value="1" v-model="subscribe">
                                        <label for="subscribe-yes">Yes</label>
                                        <input type="radio" id="subscribe-no" name="subscribe" value="0" v-model="subscribe">
                                        <label for="subscribe-no">No</label>
                                    </fieldset>
                                </div>
                                <div class="cell large-12 medium-12">
                                    <a class="button" tabindex="0" @click="goBack">go back</a>
                                    <button type="submit" class="button" @click.prevent="submitForm">submit</button>
                                    <p v-if="step3ErrorsFound" class="error-message">You have a few errors, please fix
                                        them
                                        before continuing!</p>
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
    import {required, numeric, maxLength, minLength, minValue, maxValue, email} from 'vuelidate/lib/validators'

    export default {
        name: 'Screen',
        data () {
            return {
                trialData: [],
                currentStep: 1,
                trialsFound: 0,
                questions: [],
                step1ErrorsFound: false,
                step3ErrorsFound: false,
                submitted: false,
                age: '',
                gender: 'male',
                smoker: 'no',
                zip: '',
                distance: 'any',
                conditions: '',
                name: '',
                patientName: '',
                email: '',
                phone: '',
                subscribe: '1'
            }
        },
        validations: {
            age: {
                required,
                numeric,
                minValue: minValue(0),
                maxValue: maxValue(120)
            },
            zip: {
                required,
                numeric,
                minLength: minLength(5),
                maxLength: maxLength(5)
            },
            name: {
                required
            },
            email: {
                required,
                email
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
                if (this.currentStep === 1) {
                    if (!this.$v.age.$invalid && !this.$v.zip.$invalid) {
                        this.step1ErrorsFound = false
                        if (this.questions.length > 0) {
                            this.currentStep = 2
                        } else {
                            this.currentStep = 3
                        }
                    } else {
                        this.step1ErrorsFound = true
                    }
                }
                else if (this.currentStep === 2) {
                    this.currentStep = 3
                }
            },
            goBack () {
                if (this.currentStep === 3) {
                    if (!this.$v.name.$invalid && !this.$v.email.$invalid) {
                        this.step3ErrorsFound = false
                        if (this.questions.length > 0) {
                            this.currentStep = 2
                        } else {
                            this.currentStep = 1
                        }
                    } else {
                        this.step3ErrorsFound = true
                    }
                }
                else if (this.currentStep === 2) {
                    this.currentStep = 1
                }
            },
            submitForm () {
                console.log('submitForm')
                if (!this.$v.$invalid) {
                    this.errorsFound = false
                    this.submitted = true
                    this.currentStep = 4
                } else {
                    this.step3ErrorsFound = true
                }
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

        .error-text {
            display: none;
        }

        .error {
            input {
                border: 1px solid $secondary !important;
            }

            .error-text {
                display: block;
            }
        }

        .error-text,
        .error-message {
            color: $secondary;
            font-size: 0.75em;
            margin-top: .25rem;
        }

        .error-message {
            font-size: 1rem;
            margin-top: 1rem;
        }
    }
</style>
