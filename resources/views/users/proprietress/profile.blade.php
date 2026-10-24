@extends('layouts.app')

@section('title', 'Our Proprietress | EduGreen Infant and Primary School')
@section('styles')
<style>


/* =====================================
   EDUGREEN PROPRIETRESS PROFILE
===================================== */

.proprietress-page {
    padding: 90px 0;
    background: #f7faf7;
}

.proprietress-page .container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.proprietress-profile {
    display: grid;
    grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
    align-items: center;
    gap: 65px;
}

/* IMAGE */

.proprietress-photo {
    position: relative;
    min-width: 0;
    padding: 12px;
    border: 1px solid #e1ebe3;
    border-radius: 20px;
    background: #fff;
    box-shadow: 0 20px 55px rgba(15, 65, 40, 0.10);
}

.proprietress-photo img {
    display: block;
    width: 100%;
    height: 540px;
    object-fit: cover;
    object-position: center top;
    border-radius: 13px;
    background: #e8f1e9;
}

.proprietress-photo-label {
    position: absolute;
    right: 25px;
    bottom: 28px;
    left: 25px;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px 18px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.96);
    color: #145d39;
    font-size: 14px;
    font-weight: 700;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.proprietress-photo-label i {
    font-size: 21px;
    color: #13834b;
}

/* PROFILE CONTENT */

.proprietress-content {
    min-width: 0;
}

.proprietress-label {
    display: inline-block;
    margin-bottom: 17px;
    color: #14834b;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
}

.proprietress-content h1 {
    margin: 0 0 12px;
    color: #173d2d;
    font-size: clamp(30px, 3.5vw, 43px);
    font-weight: 800;
    line-height: 1.2;
}

.proprietress-content h2 {
    margin: 0 0 8px;
    color: #118149;
    font-size: clamp(22px, 2.5vw, 29px);
    font-weight: 700;
    line-height: 1.35;
}

.proprietress-position {
    display: block;
    color: #718077;
    font-size: 14px;
    line-height: 1.8;
}

.proprietress-divider {
    width: 65px;
    height: 4px;
    margin: 24px 0;
    border-radius: 5px;
    background: #13834b;
}

.proprietress-content p {
    margin: 0 0 17px;
    color: #637268;
    font-size: 15px;
    line-height: 1.95;
}

.proprietress-content .proprietress-intro {
    color: #294e3b;
    font-size: 17px;
    font-weight: 600;
    line-height: 1.85;
}

.proprietress-content .proprietress-closing {
    margin-top: 22px;
    color: #294e3b;
    font-weight: 600;
}

/* SIGNATURE */

.proprietress-signoff {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-top: 25px;
}

.proprietress-signoff .signoff-line {
    width: 4px;
    height: 48px;
    border-radius: 5px;
    background: #13834b;
}

.proprietress-signoff strong,
.proprietress-signoff span {
    display: block;
}

.proprietress-signoff strong {
    margin-bottom: 5px;
    color: #173d2d;
    font-size: 16px;
}

.proprietress-signoff div span {
    color: #718077;
    font-size: 13px;
}

/* TABLET */

@media (max-width: 991px) {
    .proprietress-page {
        padding: 65px 0;
    }

    .proprietress-profile {
        gap: 35px;
        grid-template-columns: minmax(0, 0.85fr) minmax(0, 1.15fr);
    }

    .proprietress-photo img {
        height: 450px;
    }
}

/* MOBILE */

@media (max-width: 767px) {
    .proprietress-page {
        padding: 45px 0;
    }

    .proprietress-profile {
        grid-template-columns: minmax(0, 1fr);
        gap: 35px;
    }

    .proprietress-photo {
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
    }

    .proprietress-photo img {
        height: min(115vw, 500px);
        min-height: 320px;
    }

    .proprietress-content h1 {
        font-size: 32px;
    }

    .proprietress-content h2 {
        font-size: 25px;
    }

    .proprietress-content .proprietress-intro {
        font-size: 16px;
    }
}

@media (max-width: 400px) {
    .proprietress-page .container {
        padding: 0 15px;
    }

    .proprietress-photo {
        padding: 8px;
        border-radius: 15px;
    }

    .proprietress-photo img {
        min-height: 280px;
        border-radius: 10px;
    }

    .proprietress-photo-label {
        right: 16px;
        bottom: 18px;
        left: 16px;
        padding: 12px;
        font-size: 12px;
    }

    .proprietress-content h1 {
        font-size: 28px;
    }
}


</style>

@endsection

@section('content')

<section class="proprietress-page">
    <div class="container">
        <div class="proprietress-profile">

            {{-- LEFT: IMAGE --}}
            <div class="proprietress-photo">
                <img
                    src="{{ asset('frontend/assets/img/ppp.jpeg') }}"
                    alt="Proprietress of EduGreen Infant and Primary School"
                >

                <div class="proprietress-photo-label">
                    <i class="fa fa-graduation-cap"></i>
                    <span>Leadership in Education</span>
                </div>
            </div>

            {{-- RIGHT: PROFILE CONTENT --}}
            <div class="proprietress-content">

                <span class="proprietress-label">
                    MEET OUR PROPRIETRESS
                </span>

                <h1>Welcome to EduGreen</h1>

                <h2>[Mrs Christopher Bolanle]</h2>

                <span class="proprietress-position">
                    Proprietress, Edugreen Infant and Junior School
                </span>

                <div class="proprietress-divider"></div>

                <p class="proprietress-intro">
                    Educationist | Parenting Coach | Mentor | Christian 
                    | Child Development Advocate | Proprietress, Edugreen Infant & Junior School
                </p>

    <p style="text-align: justify; ">
                   Mrs. Christopher Bolanle is an Educationist, Parenting Coach,
                    Mentor, Christian, and Child Development Advocate with a deep 
                    passion for raising and nurturing children to become confident,
                     responsible, and purposeful individuals.

She is the Proprietress of Edugreen Infant and Junior School, a child development
 centre committed to providing children with a strong foundation for learning,
  character development, creativity, and personal growth.

As an Educationist, Mrs. Bolanle believes that education goes beyond the classroom. 
She is passionate about helping children discover their abilities while equipping
 parents and educators with the knowledge and mindset needed to support every child's development.

As a Parenting Coach and Mentor, she encourages parents to become more intentional, 
informed, and actively involved in their children's learning and overall development.
 She believes strongly in the partnership between the home, school, and community in raising well-rounded children.

Above all, Mrs. Bolanle is a Christian whose faith shapes her values, leadership,
 and passion for serving children, families, and the wider community.

She is happily married to Mr. Christopher Anyanwu Jessey, and together they are 
blessed with five beautiful children. Her experiences as a wife, mother, educationist,
 and school leader further inspire her passion for supporting families and building stronger foundations for children.

Her vision is to contribute to a generation of children who are not only academically 
equipped but also confident, disciplined, compassionate, creative, and purposeful.
                </p>

            

                <p class="proprietress-closing">
                    Thank you for being part of the EduGreen family.
                    Together, let us nurture young minds and build a
                    brighter future.
                </p>

                <div class="proprietress-signoff">
                    <span class="signoff-line"></span>
                    <div>
                        <strong>[Mrs Christopher Bolanle]</strong>
                        <span>Proprietress</span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection