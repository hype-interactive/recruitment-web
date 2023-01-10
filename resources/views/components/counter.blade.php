
<div class="counter-wrapper">
    <section id="counter" class="counter">
        <div class="row">
            <div class="col-md-4">
                <h5>Vacancies</h5>
                <div class="counter-box">
                    <h2 class="statistic-counter">{{ 100 + count($posts) }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Assisted</h5>
                <div class="counter-box">
                    <h2 class="statistic-counter">{{ 1000 + $applications }}</h2>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Companies</h5>

                <div class="counter-box">
                    <h2 class="statistic-counter">{{ 100 }}</h2>
                </div>
            </div>
        </div>
    </section>
</div>