<x-layouts.master>
    @php
    $faqs = [
        [
            'question' => 'Is UGV approved by Govt and UGC?',
            'answer'   => 'Yes'
        ],
        [
            'question' => 'Can I attend BCS Exam after graduation from UGV?',
            'answer'   => 'Yes'
        ],
        [
            'question' => 'Does UGV allow Credit transfer from other universities?',
            'answer'   => 'Yes'
        ],
        [
            'question' => 'Does UGV tuition fees fluctuate?',
            'answer'   => 'No'
        ],
        [
            'question' => 'Can I get the mark without attending exam?',
            'answer'   => 'No'
        ],
        [
            'question' => 'Can I continue the semester without registration?',
            'answer'   => 'No'
        ],
        [
            'question' => 'Can you please tell me the duration of the graduation course?',
            'answer'   => 'Four years'
        ]
    ];
    @endphp

    @push('style')
    <style>
        .admissions-page {
            /* font-family: Arial, sans-serif;
            color: #333; */
            /* background-color: #f9f9f9; */
            padding: 20px;
        }
        .admissions-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 20px;
        }
        .admissions-sidebar {
            flex: 0 0 290px;
            background-color: #ffffff;
            padding: 20px;
            position: sticky;
            top: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: fit-content;

        }
        .admissions-sidebar h2 {
            font-size: 1.5rem;
            color: #003366;
            margin-bottom: 1rem;
        }
        .admissions-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .admissions-sidebar ul li {
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .admissions-sidebar ul li:hover {
            background-color: #e6f0ff;
        }
        .admissions-sidebar ul li a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .admissions-content {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .admissions-content section {
            margin-bottom: 2rem;
        }
        .admissions-content section h2 {
            border-bottom: 2px solid #003366;
            padding-bottom: 0.5rem;
            font-size: 1.8rem;
            color: #003366;
            margin-bottom: 1rem;
        }
        .admissions-content section h3 {
            font-size: 1.4rem;
            color: #003366;
            margin-top: 1rem;
        }
        .admissions-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        .admissions-content table th,
        .admissions-content table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .faq-item {
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 1rem;
            background-color: #fafafa;
        }
        .faq-item summary {
            padding: 10px;
            font-weight: bold;
            cursor: pointer;
            background-color: #e0e0e0;
            border-bottom: 1px solid #ccc;
        }
        .faq-item[open] summary {
            background-color: #d0d0d0;
        }
        .faq-item .faq-answer {
            padding: 10px;
        }
    </style>
    @endpush
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url({{ asset('assets/images/banner/banner.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admissions</li>
                        </ul>
                        <h2 class="section-title">Admissions</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="admissions-page">
        <div class="admissions-container">
            <aside class="admissions-sidebar sticky-top">
                <h2>Contents</h2>
                <ul>
                    <li><a href="#undergrad">Under Graduate Admission Info</a></li>
                    <li><a href="#postgrad">Post Graduate Admission Details</a></li>
                    <li><a href="#dates">Important Dates &amp; Deadlines</a></li>
                    <li><a href="#financial">Financial Assistance</a></li>
                    <li><a href="#faqs">FAQs</a></li>
                    <li><a href="#credit">Credit Transfer</a></li>
                </ul>
            </aside>

            <div class="admissions-content">
                <section id="undergrad">
                    <h2>Under Graduate Admission Info</h2>
                    <ul>
                        <li>Minimum GPA of 2.5 both in SSC and HSC examinations or equivalent,</li>
                        <li>Or, At least one GPA of 2.00 but aggregate GPA of 6.00 in SSC and HSC,</li>
                        <li>Or, O’Level in 5 subjects with a minimum GPA 2.50 &amp; A’Level in 2 subjects with a minimum GPA 2.00 (A = 5, B = 4, C = 3, D = 2, E = 1),</li>
                        <li>Or, Average 450 marks out of 800 in GED with five subjects (below 410 in any subject is not allowed),</li>
                        <li>Or, International Baccalaureate/American High School Diploma or equivalent.</li>
                        <li>Or, Sons/daughters of freedom fighters with an aggregate GPA of 5.00 in SSC and HSC.</li>
                    </ul>
                </section>

                <section id="postgrad">
                    <h2>Post Graduate Admission Details</h2>
                    <p>Minimum GPA of 2.00 (or third class/division) in Bachelor degrees with:</p>
                    <ul>
                        <li>Minimum GPA of 2.5 both in SSC and HSC examinations or equivalent,</li>
                        <li>Or, At least one GPA of 2.00 but aggregate GPA of 6.00 in SSC and HSC,</li>
                        <li>Or, O’Level in 5 subjects with a minimum GPA 2.50 &amp; A’Level in 2 subjects with a minimum GPA 2.00 (A = 5, B = 4, C = 3, D = 2, E = 1),</li>
                        <li>Or, Average 450 marks out of 800 in GED with five subjects (below 410 in any subject is not allowed),</li>
                        <li>Or, International Baccalaureate/American High School Diploma or equivalent,</li>
                        <li>Or, Sons/daughters of freedom fighters with an aggregate GPA of 5.00 in SSC and HSC.</li>
                    </ul>
                </section>

                <section id="dates">
                    <h2>Important Dates &amp; Deadlines</h2>
                    <table>
                        <tr>
                            <th>Item</th>
                            <th>Details</th>
                        </tr>
                        <tr>
                            <td>Admission Sessions</td>
                            <td>Summer and Winter</td>
                        </tr>
                        <tr>
                            <td>Admission deadlines for each session</td>
                            <td>Summer (30 June) and Winter (30 December)</td>
                        </tr>
                        <tr>
                            <td>Class Starts date</td>
                            <td>Summer (1-10 July) and Winter (1-10 January)</td>
                        </tr>
                        <tr>
                            <td>Registration deadline</td>
                            <td>Before 5 months of Final Exam</td>
                        </tr>
                        <tr>
                            <td>Tuition fees payment</td>
                            <td>50% with Registration and 50% with Mid Exam</td>
                        </tr>
                    </table>
                </section>

                <section id="financial">
                    <h2>Financial Assistance</h2>
                    <h3>Discount on Tuition Fee</h3>
                    <p>Discount on tuition fee, based on performance in UGV and financial need.</p>
                    <p>50% financial discount for concurrently admitted siblings &amp; spouse on entry.</p>
                    <h3>Full Tuition Waiver</h3>
                    <p>Full tuition waiver to students with:</p>
                    <ul>
                        <li>GPA 5.00 in both SSC and HSC (Excluding 4th subject)</li>
                        <li>7 A’s in O-level (one sitting) and 3 A’s in A-level</li>
                    </ul>
                </section>

                <section id="faqs">
                    <h2>FAQs</h2>
                    @foreach($faqs as $index => $faq)
                    <details class="faq-item" open>
                        <summary class="faq-question">{{ $faq['question'] }}</summary>
                        <div class="faq-answer">
                            {{ $faq['answer'] }}
                        </div>
                    </details>
                    @endforeach
                </section>

                <section id="credit">
                    <h2>Credit Transfer</h2>
                    <p>
                        Transfer from other universities: Students with good academic records from other recognized universities are eligible for transfer of their credits to UGV. Students wishing to transfer from another university must have transcripts of courses and grades, together with copies of certificate/mark sheets of SSC or HSC or transcripts of O and A levels. These transcripts will be evaluated against the minimum entry requirement at UGV.
                    </p>
                    <p>
                        Exemption of Courses: Students with extensive academic or professional experience may apply to waive courses by completing a ‘Request for Course Waiver’ form. This form should be submitted to the Coordinator of the Program, Head of the Department, or Dean of the Faculty with the relevant academic transcripts or evidence of an appropriate certification.
                    </p>
                    <p>
                        Students having completed any Bachelor’s degree course from another recognized university are eligible for a waiver provided that they obtained at least a ‘B’ grade or over 50 percent marks in that specific course. Waivers are given on foundation courses only. A course waiver requires approval from the Equivalence Committee of UGV.
                    </p>
                </section>
            </div>
        </div>
    </div>
</x-layouts.master>
