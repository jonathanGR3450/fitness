@extends('layouts.app')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        --purple-dark: #410445;      /* Púrpura oscuro */
        --purple-medium: #A5158C;    /* Púrpura medio */
        --pink-bright: #FF2DF1;      /* Fucsia brillante */
        --yellow: #F6DC43;           /* Amarillo */
        --green: #CCD537;            /* Verde (Pear del manual) */
        --neutral-light: #FAF9F7;
        --neutral-cream: #F5F2ED;
        --neutral-sand: #E8E2D5;
        --neutral-white: #FFFFFF;
        --dark-text: #2C3E50;
        --medium-text: #6C757D;
        --light-text: #9CA3AF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Organic Shape Dividers */
    .wave-divider-top {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
    }

    .wave-divider-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }

    .wave-divider-top svg,
    .wave-divider-bottom svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 80px;
    }

    /* Hero Section */
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        background: rgba(250, 249, 247, 0.7);
        padding: 80px 0;
    }

    .hero-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .hero-content {
        z-index: 2;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 700;
        color: var(--dark-text);
        margin-bottom: 24px;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: var(--medium-text);
        margin-bottom: 32px;
        font-weight: 400;
        line-height: 1.6;
    }

    .hero-image {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 500px;
    }

    .organic-shape-bg {
        position: absolute;
        width: 110%;
        height: 110%;
        background: linear-gradient(135deg, var(--neutral-cream) 0%, var(--neutral-sand) 100%);
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        animation: morph 8s ease-in-out infinite;
        z-index: 1;
    }

    @keyframes morph {
        0%, 100% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
        50% {
            border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
        }
    }

    .hero-image img {
        position: relative;
        width: auto;
        height: 100%;
        max-width: 100%;
        object-fit: contain;
        z-index: 2;
    }

    /* Buttons - SOLO con colores correctos */
    .btn-primary {
        display: inline-block;
        padding: 16px 40px;
        background: var(--green);  /* Verde del manual */
        color: #333;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(204, 213, 55, 0.3);
    }

    .btn-primary:hover {
        background: #B8BE30;
        color: #222;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(204, 213, 55, 0.5);
    }

    .btn-secondary {
        display: inline-block;
        padding: 16px 40px;
        background: transparent;
        color: var(--purple-dark);
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: 2px solid var(--purple-dark);
        cursor: pointer;
    }

    .btn-secondary:hover {
        background: var(--purple-dark);
        color: white;
    }

    .btn-pink {
        background: var(--green);
        color: white;
        box-shadow: 0 4px 15px rgba(255, 45, 241, 0.3);
    }

    .btn-pink:hover {
        background: var(--green);
        box-shadow: 0 6px 20px rgba(165, 21, 140, 0.4);
    }

    /* Features Section */
    .features-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.75);
        position: relative;
        overflow: hidden;
    }

    .features-section::before {
        content: '';
        position: absolute;
        top: 10%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, var(--neutral-cream) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.5;
        animation: float 15s ease-in-out infinite;
    }

    .features-section::after {
        content: '';
        position: absolute;
        bottom: 10%;
        left: -10%;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, var(--neutral-sand) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.4;
        animation: float 20s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) translateX(0); }
        25% { transform: translateY(-20px) translateX(10px); }
        50% { transform: translateY(10px) translateX(-10px); }
        75% { transform: translateY(-10px) translateX(20px); }
    }

    .section-header {
        text-align: center;
        max-width: 600px;
        margin: 0 auto 80px;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 16px;
    }

    .section-subtitle {
        font-size: 1.125rem;
        color: var(--medium-text);
        line-height: 1.6;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
    }

    .feature-card {
        position: relative;
        background: transparent;
        padding: 40px;
        border-radius: 30px;
        transition: all 0.3s ease;
        overflow: visible;
        isolation: isolate;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: var(--neutral-light);
        border-radius: 40px 20px 30px 50px;
        z-index: -1;
        transition: all 0.3s ease;
    }

    .feature-card:nth-child(2n)::before {
        border-radius: 20px 50px 40px 30px;
    }

    .feature-card:nth-child(3n)::before {
        border-radius: 30px 40px 50px 20px;
    }

    .feature-card:hover::before {
        transform: rotate(-2deg) scale(1.02);
        background: linear-gradient(135deg, var(--neutral-light) 0%, var(--neutral-cream) 100%);
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    /* Feature Icons - SOLO colores correctos */
    .feature-icon {
        width: 60px;
        height: 60px;
        background: var(--purple-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        font-size: 1.5rem;
        color: white;
    }

    .feature-card:nth-child(2n) .feature-icon {
        background: var(--pink-bright);
    }

    .feature-card:nth-child(3n) .feature-icon {
        background: var(--purple-medium);
    }

    .feature-card:nth-child(4n) .feature-icon {
        background: var(--yellow);
        color: #333;
    }

    .feature-card:nth-child(5n) .feature-icon {
        background: var(--green);
        color: #333;
    }

    .feature-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 12px;
        color: var(--dark-text);
    }

    .feature-description {
        color: var(--medium-text);
        line-height: 1.6;
    }

    /* About Section with Video */
    .about-section {
        padding: 120px 0 180px;
        background: rgba(245, 242, 237, 0.7);
        position: relative;
    }

    .about-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .video-container {
        position: relative;
        height: 450px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .video-shape-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--neutral-sand) 0%, var(--neutral-light) 100%);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        z-index: 1;
        animation: morphVideo 10s ease-in-out infinite;
    }

    @keyframes morphVideo {
        0%, 100% {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        50% {
            border-radius: 70% 30% 30% 70% / 70% 70% 30% 30%;
        }
    }

    .video-container video {
        position: relative;
        width: 85%;
        height: 131%;
        object-fit: inherit;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        z-index: 2;
    }

    .about-content h2 {
        font-size: 2.5rem;
        margin-bottom: 24px;
        color: var(--dark-text);
        font-weight: 600;
    }

    .about-content p {
        font-size: 1.125rem;
        color: var(--medium-text);
        margin-bottom: 24px;
        line-height: 1.7;
    }

    .about-features {
        margin-top: 40px;
    }

    .about-feature {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .about-feature-icon {
        width: 40px;
        height: 40px;
        background: var(--neutral-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        color: var(--purple-dark);
    }

    /* Gallery Section */
    .gallery-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.75);
        position: relative;
        overflow: hidden;
    }

    .gallery-section::before {
        content: '';
        position: absolute;
        top: 10%;
        left: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--neutral-cream) 0%, transparent 60%);
        border-radius: 60% 40% 30% 70%;
        opacity: 0.3;
        animation: morph 20s ease-in-out infinite;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 60px;
    }

    .gallery-item {
        position: relative;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-shape-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--neutral-cream) 0%, var(--neutral-sand) 100%);
        border-radius: 50px 20px 50px 20px;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .gallery-item:nth-child(2n) .gallery-shape-bg {
        border-radius: 20px 50px 20px 50px;
        background: linear-gradient(135deg, var(--neutral-sand) 0%, var(--neutral-cream) 100%);
    }

    .gallery-item:nth-child(3n) .gallery-shape-bg {
        border-radius: 40px 60px 30px 40px;
        background: linear-gradient(135deg, var(--neutral-light) 0%, var(--neutral-cream) 100%);
    }

    .gallery-item img {
        position: relative;
        width: 85%;
        height: 85%;
        object-fit: cover;
        border-radius: 20px;
        z-index: 2;
        transition: transform 0.3s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .gallery-item:hover .gallery-shape-bg {
        transform: rotate(3deg) scale(1.05);
    }

    .gallery-item:hover img {
        transform: scale(1.05);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* Quote Section */
    .quote-section {
        padding: 100px 0;
        background: rgba(250, 249, 247, 0.8);
        position: relative;
        text-align: center;
        overflow: hidden;
    }

    .quote-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, var(--neutral-cream) 0%, transparent 50%);
        border-radius: 50%;
        opacity: 0.5;
        z-index: 1;
    }

    .quote-container {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .quote-text {
        font-size: 2rem;
        font-weight: 300;
        color: var(--dark-text);
        line-height: 1.6;
        margin-bottom: 32px;
        position: relative;
    }

    .quote-text::before,
    .quote-text::after {
        content: '"';
        font-size: 4rem;
        color: var(--pink-bright);
        opacity: 0.3;
        position: absolute;
    }

    .quote-text::before {
        top: -20px;
        left: -40px;
    }

    .quote-text::after {
        bottom: -40px;
        right: -40px;
    }

    .quote-author {
        font-size: 1.125rem;
        color: var(--medium-text);
        font-style: italic;
    }

    /* Pricing Section */
    .pricing-section {
        padding: 120px 0;
        background: rgba(250, 249, 247, 0.75);
        position: relative;
        overflow: hidden;
    }

    .pricing-section::before {
        content: '';
        position: absolute;
        top: 8%;
        right: -60px;
        width: 320px;
        height: 320px;
        background: rgba(245, 242, 237, 0.6);
        border-radius: 45% 55% 50% 50%;
        z-index: 0;
    }

    .pricing-section::after {
        content: '';
        position: absolute;
        bottom: 12%;
        left: -50px;
        width: 280px;
        height: 280px;
        background: rgba(235, 231, 223, 0.5);
        border-radius: 55% 45% 60% 40%;
        z-index: 0;
    }

    .pricing-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 32px;
        margin-top: 60px;
        position: relative;
        z-index: 2;
    }

    .pricing-card {
        position: relative;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 24px;
        padding: 48px 36px;
        text-align: center;
        transition: all 0.4s ease;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(232, 226, 213, 0.4);
    }

    .pricing-card.featured {
        transform: scale(1.02);
        box-shadow: 0 8px 24px rgba(255, 45, 241, 0.12);
        border: 2px solid var(--pink-bright);
        background: rgba(255, 255, 255, 0.98);
    }

    .pricing-card.featured::after {
        content: 'MÁS ELEGIDO';
        position: absolute;
        top: -14px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--pink-bright);
        color: white;
        padding: 6px 28px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 1.5px;
    }

    .pricing-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
    }

    .pricing-card.featured:hover {
        transform: scale(1.02) translateY(-6px);
    }

    .plan-name {
        font-size: 0.95rem;
        font-weight: 400;
        color: var(--dark-text);
        margin-bottom: 24px;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }

    .plan-price {
        font-size: 3.5rem;
        font-weight: 300;
        color: var(--dark-text);
        margin-bottom: 8px;
        line-height: 1;
    }

    .plan-period {
        font-size: 0.9rem;
        color: var(--medium-text);
        margin-bottom: 40px;
        font-weight: 300;
    }

    .plan-features {
        list-style: none;
        margin-bottom: 40px;
        text-align: left;
        padding: 0 8px;
    }

    .plan-features li {
        padding: 16px 0;
        color: var(--medium-text);
        display: flex;
        align-items: flex-start;
        font-size: 0.95rem;
        line-height: 1.6;
        border-bottom: 1px solid rgba(232, 226, 213, 0.3);
        font-weight: 300;
    }

    .plan-features li:last-child {
        border-bottom: none;
    }

    .plan-features li::before {
        content: '✓';
        color: var(--green);
        font-weight: bold;
        margin-right: 12px;
        font-size: 1.25rem;
    }

    /* Testimonials Section */
    .testimonials-section {
        padding: 120px 0;
        background: rgba(255, 255, 255, 0.85);
        position: relative;
        overflow: hidden;
    }

    .testimonials-section::before {
        content: '';
        position: absolute;
        top: 20%;
        right: -15%;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(204, 213, 55, 0.1) 0%, transparent 60%);
        border-radius: 30% 70% 60% 40%;
        animation: float 25s ease-in-out infinite;
    }

    .testimonials-section::after {
        content: '';
        position: absolute;
        bottom: 15%;
        left: -10%;
        width: 280px;
        height: 280px;
        background: radial-gradient(circle, rgba(255, 45, 241, 0.08) 0%, transparent 60%);
        border-radius: 70% 30% 40% 60%;
        animation: float 20s ease-in-out infinite reverse;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .testimonial-card {
        position: relative;
        padding: 40px;
        border-radius: 30px;
        isolation: isolate;
    }

    .testimonial-card::before {
        content: '';
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        background: var(--neutral-light);
        border-radius: 50px 30px 40px 60px;
        z-index: -1;
        transition: all 0.3s ease;
    }

    .testimonial-card:nth-child(2n)::before {
        border-radius: 30px 60px 50px 40px;
        background: linear-gradient(135deg, var(--neutral-light) 0%, var(--neutral-cream) 100%);
    }

    .testimonial-card:nth-child(3n)::before {
        border-radius: 40px 50px 30px 60px;
    }

    .testimonial-card:hover::before {
        transform: rotate(1deg) scale(1.02);
    }

    .testimonial-avatar {
        position: relative;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin-bottom: 24px;
        object-fit: cover;
        border: 4px solid var(--neutral-white);
        z-index: 2;
    }

    .testimonial-card::after {
        content: '';
        position: absolute;
        top: 30px;
        left: 30px;
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, var(--pink-bright) 0%, var(--purple-medium) 100%);
        border-radius: 50%;
        opacity: 0.1;
        z-index: 1;
    }

    .testimonial-text {
        font-size: 1.125rem;
        color: var(--medium-text);
        line-height: 1.7;
        margin-bottom: 24px;
        font-style: italic;
    }

    .testimonial-name {
        font-weight: 600;
        color: var(--dark-text);
        margin-bottom: 4px;
    }

    .testimonial-role {
        color: var(--pink-bright);
        font-size: 0.875rem;
    }

    /* Contact Section */
    .contact-section {
        padding: 120px 0;
        background: rgba(245, 242, 237, 0.7);
        position: relative;
        overflow: hidden;
    }

    .contact-section::before {
        content: '';
        position: absolute;
        top: 20%;
        left: 5%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, var(--neutral-sand) 0%, transparent 60%);
        border-radius: 60% 40% 30% 70%;
        opacity: 0.3;
        animation: morph 12s ease-in-out infinite;
    }

    .contact-section::after {
        content: '';
        position: absolute;
        bottom: 10%;
        right: 5%;
        width: 180px;
        height: 180px;
        background: radial-gradient(circle, var(--neutral-light) 0%, transparent 60%);
        border-radius: 30% 70% 60% 40%;
        opacity: 0.4;
        animation: morph 15s ease-in-out infinite reverse;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: start;
    }

    .contact-info h3 {
        font-size: 2rem;
        margin-bottom: 24px;
        color: var(--dark-text);
    }

    .contact-info p {
        font-size: 1.125rem;
        color: var(--medium-text);
        margin-bottom: 32px;
        line-height: 1.6;
    }

    .contact-details {
        margin-top: 40px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 24px;
    }

    .contact-icon {
        width: 48px;
        height: 48px;
        background: var(--neutral-white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
        color: var(--purple-dark);
    }

    .contact-form {
        position: relative;
        background: var(--neutral-white);
        padding: 48px;
        border-radius: 30px;
        isolation: isolate;
    }

    .contact-form::before {
        content: '';
        position: absolute;
        top: -20px;
        left: -20px;
        right: -20px;
        bottom: -20px;
        background: linear-gradient(135deg, var(--neutral-sand) 0%, var(--neutral-light) 100%);
        border-radius: 50px 30px 60px 40px;
        z-index: -1;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .contact-form:hover::before {
        transform: rotate(1deg) scale(1.02);
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--dark-text);
        font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 16px;
        border: 2px solid var(--neutral-sand);
        border-radius: 15px;
        background: var(--neutral-light);
        font-family: 'Open Sans', sans-serif;
        font-size: 1rem;
        transition: all 0.3s ease;
        color: var(--dark-text);
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: var(--purple-dark);
        background: var(--neutral-white);
    }

    .whatsapp-btn {
        display: inline-flex;
        align-items: center;
        padding: 16px 32px;
        background: #25D366;
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: 24px;
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
    }

    .whatsapp-btn:hover {
        background: #20BA5A;
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
    }

    .whatsapp-btn i {
        margin-right: 12px;
        font-size: 1.25rem;
    }

    /* Responsive */
    @media (max-width: 968px) {
        .hero-container,
        .about-container,
        .contact-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .hero-image {
            height: 400px;
        }

        .video-container {
            height: 350px;
        }

        .features-grid,
        .testimonials-grid {
            grid-template-columns: 1fr;
        }

        .pricing-card.featured {
            transform: scale(1);
        }
        
        .pricing-grid {
            grid-template-columns: 1fr;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        .quote-text {
            font-size: 1.5rem;
        }

        .quote-text::before,
        .quote-text::after {
            display: none;
        }
    }

    @media (max-width: 640px) {
        .section-title {
            font-size: 2rem;
        }

        .hero-title {
            font-size: 2rem;
        }

        .hero-image {
            height: 300px;
        }

        .organic-shape-bg {
            width: 120%;
        }

        .video-container {
            height: 250px;
        }

        .gallery-item {
            height: 250px;
        }

        .pricing-grid {
            grid-template-columns: 1fr;
        }

        .contact-form {
            padding: 32px 24px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Transforma tu vida con el Move Challenge</h1>
                <p class="hero-subtitle">30 días de movimiento consciente, nutrición balanceada y conexión interior. Únete a nuestra comunidad y descubre tu mejor versión.</p>
                <a href="#contact" class="btn-primary">Quiero mi cupo</a>
            </div>
            <div class="hero-image">
                <div class="organic-shape-bg"></div>
                <img src="{{ asset('images/sinfondo.png') }}" alt="Move Challenge" 
                     onerror="this.style.display='none'">
            </div>
        </div>
    </div>
    <div class="wave-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="var(--neutral-white)"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section id="servicios" class="features-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">¿Qué incluye el Move Challenge?</h2>
            <p class="section-subtitle">Todo lo que necesitas para crear hábitos sostenibles y transformar tu bienestar</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <h3 class="feature-title">Plan de entrenamiento semipersonalizado</h3>
                <p class="feature-description">Rutinas adaptadas para casa o gimnasio, diseñadas según tu nivel y objetivos específicos.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-apple-alt"></i>
                </div>
                <h3 class="feature-title">Plan de alimentación nutritivo</h3>
                <p class="feature-description">Menús balanceados adaptados a tus requerimientos y gustos, sin restricciones extremas.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3 class="feature-title">Recetas fáciles y deliciosas</h3>
                <p class="feature-description">Preparaciones simples y nutritivas que se adaptan a tu rutina diaria.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-spa"></i>
                </div>
                <h3 class="feature-title">Meditación y respiración</h3>
                <p class="feature-description">Técnicas guiadas para conectar cuerpo y mente, reducir estrés y mejorar tu bienestar.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="feature-title">Tips de conexión interior</h3>
                <p class="feature-description">Herramientas prácticas para desarrollar consciencia y mantener la motivación.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Comunidad de apoyo</h3>
                <p class="feature-description">Acompañamiento constante de profesionales y compañeros en tu journey.</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section with Video -->
<section id="nosotros" class="about-section">
    <div class="container">
        <div class="about-container">
            <div class="video-container">
                <div class="video-shape-bg"></div>
                <video controls preload="metadata" playsinline poster="{{ asset('images/banner3.jpeg') }}">
                    <source src="{{ asset('video/video-promocional.mp4') }}" type="video/mp4">
                    <source src="{{ asset('video/video-promocional.webm') }}" type="video/webm">
                    Tu navegador no soporta reproducción de video.
                </video>
            </div>
            <div class="about-content">
                <h2>¿Qué es el Move Challenge?</h2>
                <p>El Move Challenge es un programa integral de 30 días diseñado para transformar tu vida a través del movimiento consciente y hábitos saludables sostenibles.</p>
                <p>No es solo un reto fitness, es una experiencia completa que integra entrenamiento físico, nutrición balanceada, mindfulness y el poder de una comunidad comprometida.</p>
                
                <div class="about-features">
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <span>Guía de movilidad y estiramientos diarios</span>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <span>Seguimiento personalizado de tu progreso</span>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <span>Premios para los mejores resultados</span>
                    </div>
                </div>

                <a href="https://wa.link/nq2ezt" target="_blank" class="btn-primary btn-pink">
                    Conoce más detalles
                </a>
            </div>
        </div>
    </div>
    <div class="wave-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="var(--neutral-white)"></path>
        </svg>
    </div>
</section>

<!-- Gallery Section -->
<section id="portafolio" class="gallery-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Momentos del Move Challenge</h2>
            <p class="section-subtitle">Historias reales de transformación y superación personal</p>
        </div>
        <div class="gallery-grid">
            <div class="gallery-item">
                <div class="gallery-shape-bg"></div>
                <img src="{{ asset('images/move-1.png') }}" alt="Entrenamientos MOVE">
            </div>
            <div class="gallery-item">
                <div class="gallery-shape-bg"></div>
                <img src="{{ asset('images/move-2.png') }}" alt="Comunidad en acción">
            </div>
            <div class="gallery-item">
                <div class="gallery-shape-bg"></div>
                <img src="{{ asset('images/move-3.png') }}" alt="Hábitos y nutrición">
            </div>
            <div class="gallery-item">
                <div class="gallery-shape-bg"></div>
                <img src="{{ asset('images/move-4.png') }}" alt="Rutinas en casa">
            </div>
        </div>
    </div>
</section>

<!-- Inspirational Quote -->
<section class="quote-section">
    <div class="container">
        <div class="quote-container">
            <p class="quote-text">El movimiento es medicina. Cuando mueves tu cuerpo, transformas tu mente y elevas tu espíritu.</p>
            <p class="quote-author">- Anabelle Ibalu</p>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Elige tu plan de transformación</h2>
            <p class="section-subtitle">Inversión en tu bienestar con resultados garantizados</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h3 class="plan-name">Starter</h3>
                <div class="plan-price">$49</div>
                <p class="plan-period">Plan de 30 días</p>
                <ul class="plan-features">
                    <li>Plan de entrenamiento básico</li>
                    <li>Guía nutricional general</li>
                    <li>Acceso a la comunidad</li>
                    <li>3 recetas semanales</li>
                    <li>Videos de técnica</li>
                </ul>
                <a href="#contact" class="btn-secondary">Comenzar ahora</a>
            </div>
            
            <div class="pricing-card featured">
                <h3 class="plan-name">Premium</h3>
                <div class="plan-price">$99</div>
                <p class="plan-period">Plan de 30 días</p>
                <ul class="plan-features">
                    <li>Plan personalizado completo</li>
                    <li>Nutrición adaptada a tus metas</li>
                    <li>Sesiones grupales en vivo</li>
                    <li>Recetario completo</li>
                    <li>Meditaciones guiadas</li>
                    <li>Seguimiento semanal</li>
                    <li>Acceso a challenges exclusivos</li>
                </ul>
                <a href="#contact" class="btn-primary btn-pink">Más elegido</a>
            </div>
            
            <div class="pricing-card">
                <h3 class="plan-name">Elite</h3>
                <div class="plan-price">$199</div>
                <p class="plan-period">Plan de 90 días</p>
                <ul class="plan-features">
                    <li>Todo lo de Premium</li>
                    <li>Coaching 1:1 semanal</li>
                    <li>Plan 100% personalizado</li>
                    <li>WhatsApp directo</li>
                    <li>Análisis de progreso mensual</li>
                    <li>Programa extendido</li>
                </ul>
                <a href="#contact" class="btn-secondary">Aplicar ahora</a>
            </div>
        </div>
    </div>
    <div class="wave-divider-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" fill="var(--neutral-white)"></path>
        </svg>
    </div>
</section>



<!-- Contact Section -->
<section id="contacto" class="contact-section">
    <div class="container">
        <div class="contact-container">
            <div class="contact-info">
                <h3>¿Lista/o para empezar tu transformación?</h3>
                <p>Escríbeme y te comparto todos los detalles del programa, próximas fechas de inicio y cómo puedes reservar tu cupo.</p>
                
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <strong>Email</strong><br>
                            hola@anabelleibalu.com
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div>
                            <strong>Instagram</strong><br>
                            @anabelleibalu
                        </div>
                    </div>
                </div>

                <a href="https://wa.link/nq2ezt" target="_blank" class="whatsapp-btn">
                    <i class="fab fa-whatsapp"></i>
                    Habla conmigo por WhatsApp
                </a>
            </div>
            
            <form class="contact-form" method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre completo</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="goal">Tu objetivo principal</label>
                    <textarea id="goal" name="goal" rows="4" placeholder="Cuéntame qué te motivó a buscar un cambio (ganar energía, bajar grasa, crear hábito, etc.)" required></textarea>
                </div>
                <button type="submit" class="btn-primary" style="width: 100%;">
                    Enviar mensaje
                </button>
            </form>
        </div>
    </div>
</section>



<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection