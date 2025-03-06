'use client'
import Footer from '@/components/Footer/Footer';
import Menu from '@/components/Header/Menu/Menu';
import TopNav from '@/components/Header/TopNav/TopNav';
import Partner from '@/components/Partner/Partner'; 
import Breadcrumb from '@/components/Section/Breadcrumb'; 
import React, { useEffect, useState } from 'react';
import serviceData from '@/data/service.json'
import Image from 'next/image';
import Link from 'next/link';
import { API_BASE_URL, IMAGE_BASE_URL } from '@/config/config';
import ClipLoader from 'react-spinners/ClipLoader';
 
const ServiceDetails = ({ params }) => {

    const getTextFromHTML = (html) => {
        const div = document.createElement('div');
        div.innerHTML = html;
        return div.textContent || div.innerText || '';
    } 

    const { slug } = params;

    const [serviceDetails, setServiceDetails] = useState([]);
    const [loading, setLoading] = useState(true);
    // console.log(serviceDetails);

    useEffect(() => {
        if (slug) {
            const fetchItem = async () => {
                try {
                    const response = await fetch(`${API_BASE_URL}/service/${slug}`);
                    const data = await response.json();
                    setServiceDetails(data);
                } catch (error) {
                    console.error('Error fetching data',error);
                } finally {
                    setLoading(false);
                }
            };
            fetchItem();
        }

    },[slug]);
 


    return (
        <div className="overflow-x-hidden">
      <header id="header">
          <TopNav/>
          <Menu/>
      </header>

    {
        loading ? ( 
            <div className='flex justify-center items-center h-[500px]'>
                <ClipLoader color='#3498db' size={50} />
            </div>
        ) : (
<main className="content">
        <Breadcrumb link="Our Services Details" img="/images/header.webp" title={serviceDetails.service_name} desc={serviceDetails.service_short} />
    
    <div className='content-detail-block lg:py-[100px] sm:py-16 py-10'>
        <div className='container'>
            <div className='flex max-xl:flex-col gap-y-8'>
            <div className='w-full xl:w-3/4'>

            
        <div className='w-full xl:pr-[80px]'>
        <div className='heading3'>
        {serviceDetails.service_name}
        </div>
        <div className='bg-img mt-5 mb-5'>
            <Image width={5000} height={5000} className='w-full h-full rounded-xl' src={`${IMAGE_BASE_URL}/${serviceDetails.image}`} /> 
        </div>
        <div className='body2 text-secondary mt-4'>
        {getTextFromHTML(serviceDetails.service_desc) }
        </div> 
         </div>

      </div>


    <div className='w-full xl:w-1/4'>
        <div className='more-infor border border-line rounded-xl py-8 px-8'>
            <div className='heading6'>
            The best our Services
            </div>
            <div className='body3 text-secondary mt-2'>
            Lorem Ipsum passages, and more recently with desktop 
            </div>

        <div className='list-nav mt-4'>
            <Link className='nav-item rounded-lg flex-between p-12' href='/'>
            <div className='text-button text-secondary'>
            payment solution
            </div>
            </Link>

            <Link className='nav-item rounded-lg flex-between p-12' href='/'>
            <div className='text-button text-secondary'>
            personal finance
            </div>
            </Link>

            <Link className='nav-item rounded-lg flex-between p-12' href='/'>
            <div className='text-button text-secondary'>
            online banking
            </div>
            </Link>


            <Link className='nav-item rounded-lg flex-between p-12' href='/'>
            <div className='text-button text-secondary'>
            financial planning
            </div>
            </Link>

        </div> 
        </div>

    <div className='ads-block rounded-lg md:mt-10 mt-6 relative'>
        <div className='bg-img'>
            <Image width={5000} height={5000} src='/images/ads.webp' /> 
        </div>

        <div className='text flex flex-col justify-between absolute left-0 top-0 w-full h-full p-8'>
            <div className='title'>
                <div className='heading5 text-white'>
                Let's Talk
                </div>
                <div className='body3 text-white mt-4'>
            If you have project contact us
                </div> 
            </div>
        <div className='button-block md:mt-10 mt-6'>
             <Link className='button-main hover:bg-black hover:text-white inline-block bg-white text-button' href='/contact'>
             Contact Us
             </Link>

        </div>

        </div>

    </div>



    </div>

 
            </div> 
        </div> 
    </div>

     
     </main>

        )
    }

     

     <Partner className='lg:mt-[100px] sm:mt-16 mt-10' /> 
      <footer id="footer">
      <Footer/>
      </footer>


        </div>
    );
};

export default ServiceDetails;