<template lang="html">
    <div class="col-xl-12 d-flex justify-content-center">
        <div class="card col-6">
            <form @submit.prevent="onSubmitForm">
                <div class="card-body">
                    <div v-if="activeTabs === 'quiz'">
                        <div class="d-flex justify-content-between">
                            <label for="title" class="col-form-label">Title</label>
                            <transition name="fade">
                                <div class="d-flex align-items-center" v-if="isLoading || isSave">
                                    <img class="rounded-circle img-animation me-1" :src="loading" alt="Nama SVG" v-if="isLoading" />
                                    <img class="rounded-circle img-animation me-1" :src="check" alt="Nama SVG" v-if="isSave" />
                                    <h5 class="fw-bolder">Saved</h5>
                                </div>
                            </transition>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" @input="handleTyping" v-model="formData.title" />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Description" @input="handleTyping" v-model="formData.description"></textarea>
                        </div>
                    </div>
                    <div v-if="activeTabs === 'question'">
                        <div class="d-flex justify-content-between mb-3">
                            <transition name="fade">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle img-animation me-1" :src="loading" alt="Nama SVG" v-if="isLoading" />
                                    <img class="rounded-circle img-animation me-1" :src="check" alt="Nama SVG" v-if="isSave" />
                                    <h5 class="fw-bolder" v-if="isLoading || isSave">Saved</h5>
                                </div>
                            </transition>
                            <button class="btn btn-primary rounded-pill" @click="addFormQuestion()">
                                <i class="mdi mdi-plus"></i> Add
                            </button>
                        </div>
                        <div v-for="index in formQuestion" :key="index" :id="'formQuestion' + index" class="mb-5">
                            <diV class="d-flex justify-content-end mb-2" v-if="index !== 1">
                                <button class="btn btn-outline-danger btn-sm waves-effect waves-light" @click="removeFormQuestion()">
                                    <i class="mdi mdi-close"></i>
                                </button>
                            </diV>
                            <div class="mb-3 d-flex">
                                <label :for="'question['+ (index - 1) +']'" class="form-label me-1">{{ index }}.</label>
                                <textarea class="form-control" :name="'question['+ (index - 1) +']'" :id="'question['+ (index - 1) +']'" rows="5" placeholder="Question" @input="handleTyping" v-model="formData.questions[(index - 1)].question"></textarea>
                            </div>
                            <div class="ms-3">
                                <div class="input-group mb-2 d-flex align-items-center">
                                    <div class="form-check form-check-info">
                                        <input class="form-check-input" type="radio" :name="'correct_answer['+ (index - 1) +']'" :id="'correct_answer['+ (index - 1) +']'" value="a" v-model="formData.questions[(index - 1)].correct_answer" @input="handleTyping">
                                    </div>
                                    <input type="text" class="form-control" :name="'answer_a['+ (index - 1) +']'" :id="'answer_a['+ (index - 1) +']'" placeholder="Answer" aria-label="Answer" @input="handleTyping" v-model="formData.questions[(index - 1)].answer_a">
                                </div>
                                <div class="input-group mb-2 d-flex align-items-center">
                                    <div class="form-check form-check-info">
                                        <input class="form-check-input" type="radio" :name="'correct_answer['+ (index - 1) +']'" :id="'correct_answer['+ (index - 1) +']'" value="b" v-model="formData.questions[(index - 1)].correct_answer" @input="handleTyping">
                                    </div>
                                    <input type="text" class="form-control" :name="'answer_b['+ (index - 1) +']'" :id="'answer_b['+ (index - 1) +']'" placeholder="Answer" aria-label="Answer" @input="handleTyping" v-model="formData.questions[(index - 1)].answer_b">
                                </div>
                                <div class="input-group mb-2 d-flex align-items-center">
                                    <div class="form-check form-check-info">
                                        <input class="form-check-input" type="radio" :name="'correct_answer['+ (index - 1) +']'" :id="'correct_answer['+ (index - 1) +']'" value="c" v-model="formData.questions[(index - 1)].correct_answer" @input="handleTyping">
                                    </div>
                                    <input type="text" class="form-control" :name="'answer_c['+ (index - 1) +']'" :id="'answer_c['+ (index - 1) +']'" placeholder="Answer" aria-label="Answer" @input="handleTyping" v-model="formData.questions[(index - 1)].answer_c">
                                </div>
                                <div class="input-group mb-2 d-flex align-items-center">
                                    <div class="form-check form-check-info">
                                        <input class="form-check-input" type="radio" :name="'correct_answer['+ (index - 1) +']'" :id="'correct_answer['+ (index - 1) +']'" value="d" v-model="formData.questions[(index - 1)].correct_answer" @input="handleTyping">
                                    </div>
                                    <input type="text" class="form-control" :name="'answer_d['+ (index - 1) +']'" :id="'answer_d['+ (index - 1) +']'" placeholder="Answer" aria-label="Answer" @input="handleTyping" v-model="formData.questions[(index - 1)].answer_d">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex mt-3 justify-content-end" v-if="activeTabs === 'quiz'">
                        <button class="btn btn-primary rounded-pill" @click="setActiveTab('question')">
                            Next <i class="mdi mdi-arrow-right"></i>
                        </button>
                    </div>
                    <div class="d-flex mt-3 justify-content-between" v-else>
                        <button class="btn btn-primary rounded-pill" @click="setActiveTab('quiz')">
                            <i class="mdi mdi-arrow-left"></i> Previous
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill">
                            <i class="mdi mdi-check"></i> Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
let typingTimer;

export default {
    props: {
        user: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            activeTabs: 'quiz',
            formQuestion: 1,
            responseQueue: [],
            isLoading: false,
            isSave: false,
            loading: '/images/loading.svg',
            check: '/images/check.svg',
            formData: {
                code_quiz: "",
                title: "",
                description: "",
                questions: [
                    {
                        question: "",
                        answer_a: "",
                        answer_b: "",
                        answer_c: "",
                        answer_d: "",
                        correct_answer: ""
                    },
                ],
            },
        }
    },
    methods: {
        setActiveTab(tabName) {
            this.activeTabs = tabName;
        },
        addFormQuestion() {
            this.formQuestion++;
            this.formData.questions.push({
                question: "",
                answer_a: "",
                answer_b: "",
                answer_c: "",
                answer_d: "",
                correct_answer: ""
            });
        },
        removeFormQuestion(index) {
            if (this.formQuestion > 1) {
                this.formQuestion--;

                this.formData.questions.splice(index, 1);
            }
        },
        handleTyping() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                this.isLoading = true
                this.isSave = false
                axios
                .post("/api/draft-quiz", this.formData)
                .then(response => {
                    const res = response.data.data
                    this.formData.code_quiz = res.code_quiz

                    this.isLoading = false;
                    if(!this.isLoading){
                        this.isSave = true
                        setTimeout(() => {
                            this.isSave = false
                        }, 1500)
                    }
                })
                .catch(error => {
                    this.isLoading = false;
                    console.error(error);
                });
            }, 1000);
        },
        onSubmitForm() {
            axios.post("/quiz", this.formData)
            .then(response => {
                window.location.href = '/quiz';
            })
            .catch(error => {
                const errorMessage = 'Tolong pastikan tidak ada data yang kosong.';
                this.isLoading = false;
                toastr.error(errorMessage);
            });;
        }
    },
}
</script>

<style lang="css">
    .img-animation{
        height: 20px;
        width: 20px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.5s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active di Vue versi < 2.1.8 */ {
        opacity: 0;
    }

</style>
