<template>
    <div>
        <div class="calculate-button">
            <a class="button is-success" @click="calculate">
                <slot></slot>
            </a>
        </div>

        <div class="modal" ref="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="message has-text-left">
                    <div class="message-header">
                        Sieger
                    </div>
                    <div class="message-body">
                        <div class="rankings">
                            <div class="rankings__row rankings__header has-background-dark">
                                <div class="rankings__column__number">Platz</div>
                                <div class="rankings__column__name">Name</div>
                                <div class="rankings__column__points">Punkte</div>
                                <div class="rankings__column__megacredits">M€</div>
                            </div>
                            <transition-group tag="div" name="list" class="rankings__body">
                                <div class="rankings__row" v-for="(rank, index) in rankings" :key="rank.id" :style="`order: ${rankings.length - index}`">
                                    <div class="rankings__column__number">{{ rank.position }}.</div>
                                    <div class="rankings__column__name">{{ rank.player.display_name }}</div>
                                    <div class="rankings__column__points">{{ rank.result }}</div>
                                    <div class="rankings__column__megacredits">{{ rank.megacredits }}</div>
                                </div>
                            </transition-group>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" @click="closeModal"></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['href'],

        data() {
            return {
                rankings: [],
                show: false
            };
        },

        methods: {
            calculate() {
                axios.get(this.href).then((response) => {
                    if (response.status === 200) {
                        this.$refs.modal.classList.add('is-active');

                        let rankings = response.data.reverse();

                        for (let i = 0; i < rankings.length; i++) {
                            rankings[i].position = rankings.length - i;
                            console.log(rankings);
                            setTimeout(() => {
                                this.rankings.push(rankings[i]);
                            }, 2000 * (i + 1), rankings, i);
                        }
                    }
                });
            },

            closeModal() {
                this.$refs.modal.classList.remove('is-active');
                window.location.reload();
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../sass/variables";

    .list-enter-active {
        transition: 500ms cubic-bezier(0.59, 0.12, 0.34, 0.95);
        transition-property: opacity, transform;
    }

    .list-enter {
        opacity: 0;
        transform: translateX(50px) scaleY(0.5);
    }

    .list-enter-to {
        opacity: 1;
        transform: translateX(0) scaleY(1);
    }

    .rankings {
        overflow: hidden;

        &__row {
            display: flex;

            div {
                padding: 10px;
            }
        }

        &__column {
            &__number {
                flex-basis: 10%;
            }

            &__name {
                flex-grow: 1;
            }

            &__points {
                flex-basis: 15%;
            }

            &__megacredits {
                flex-basis: 15%;
            }
        }

        &__body {
            display: flex;
            flex-direction: column;

            .rankings__row {
                border-bottom: 1px solid $grey-darker;
            }
        }
    }
</style>
