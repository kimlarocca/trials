<template>
    <div class="trial-details">
        <loader v-if="!componentMounted"></loader>
        <template v-else>
            <h1>{{trialData.title}}</h1>
            <h6 class="margin-vertical-2">NCIT: {{trialData.ncit}}</h6>
            <div class="padding-3 bg-light-gray border-radius">
                <h3>Questions <a tabindex="0" title="add a new question" class="no-underline"
                                 @click="showAddQuestionForm = !showAddQuestionForm">
                    <i class="fas" :class="showAddQuestionForm ? 'fa-minus' : 'fa-plus'"></i>
                </a>
                </h3>
                <transition name="slide">
                    <form v-if="showAddQuestionForm" @submit.prevent="addQuestion" class="margin-vertical-2">
                        <h6>Add a new question:</h6>
                        <label for="question">Question:</label>
                        <input type="text" required v-model="question" id="question"/>
                        <label for="questionType">Type of response:</label>
                        <select v-model="questionType" id="questionType">
                            <option value="text" selected>Text Box</option>
                            <option value="paragraph">Paragraph Box</option>
                            <option value="boolean">Yes or No</option>
                        </select>
                        <button class="button" type="submit">Add Question</button>
                        <hr class="white">
                    </form>
                </transition>

                <div v-for="(question, index) in questions" :key="index"
                     class="grid-x bg-white border-radius align-middle question">
                    <div class="cell large-10">
                        {{question.question}}
                    </div>
                    <div class="cell large-2 text-right">
                        <a tabindex="0" @click="deleteQuestion(question)"><i class="fas fa-trash"></i></a>
                    </div>
                </div>

            </div>
        </template>
        <p class="margin-top-2"><a href="/dashboard"><i class="fas fa-arrow-left"></i> go back to your dashboard</a></p>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        name: 'TrialManager',
        data () {
            return {
                trialData: [],
                questions: [],
                componentMounted: false,
                showAddQuestionForm: false,
                question: '',
                questionType: ''
            }
        },
        props: {
            id: String
        },
        mounted () {
            axios.get('/api/trials/' + this.id)
                .then(response => (
                    this.trialData = response.data,
                        this.componentMounted = true,
                        this.getQuestions()
                ))
                .catch(function (error) {
                    console.log(error)
                })
        },
        methods: {
            getQuestions () {
                axios.get('/api/trial-questions/' + this.trialData.ncit)
                    .then(response => (
                        this.questions = response.data
                    ))
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            addQuestion () {
                axios
                    .post('/api/questions', {
                        ncit: this.trialData.ncit,
                        question: this.question,
                        question_type: this.questionType
                    })
                    .then(response => (
                        console.log('added ' + response),
                            this.getQuestions(),
                            this.showAddQuestionForm = false,
                            this.question = '',
                            this.questionType = ''
                    ))
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            deleteQuestion (question) {
                axios
                    .delete('/api/questions/' + question.id)
                    .then(
                        //remove from questions array
                        this.questions = this.questions.filter(item => item !== question)
                    )
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>

<style lang="scss">
    .trial-details {
        .question {
            width: 100%;
            padding: 1rem;
            margin-bottom: .5rem;
        }
    }
</style>
