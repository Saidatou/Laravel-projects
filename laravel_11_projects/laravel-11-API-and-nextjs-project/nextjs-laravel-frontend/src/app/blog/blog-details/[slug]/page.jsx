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
import * as Icon from '@phosphor-icons/react/dist/ssr'

const BlogDetails = ({ params }) => {

    const getTextFromHTML = (html) => {
        const div = document.createElement('div');
        div.innerHTML = html;
        return div.textContent || div.innerText || '';
    }

    const { slug } = params;

    const [blogDetails, setBlogDetails] = useState([]);
    const [loading, setLoading] = useState(true);
     console.log(blogDetails);

    useEffect(() => {
        if (slug) {
            const fetchItem = async () => {
                try {
                    const response = await fetch(`${API_BASE_URL}/allblog/${slug}`);
                    const data = await response.json();
                    setBlogDetails(data);
                } catch (error) {
                    console.error('Error fetching data',error);
                } finally {
                    setLoading(false);
                }
            };
            fetchItem();
        }

    },[slug]);


    const formattedDate = new Date(blogDetails.created_at).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });


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
        <Breadcrumb link={blogDetails.category_name} img="/images/header.webp" title={blogDetails.post_title} desc="The jobs report soundly beat expectations, with job gains broadly spread across the economy and about 60% higher" />
    
    <div className='content-detail-block lg:py-[100px] sm:py-16 py-10'>
        <div className='container'>
            <div className='flex max-xl:flex-col gap-y-8'>
            <div className='w-full xl:w-3/4'>

            
        <div className='w-full xl:pr-[80px]'>
        <div className='heading3'>
        {blogDetails.post_title}
        </div>
        <div className='bg-img mt-5 mb-5'>
            <Image width={5000} height={5000} className='w-full h-full rounded-xl' src={`${IMAGE_BASE_URL}/${blogDetails.image}`} /> 
        </div>

        <div className='date flex items-center gap-4 mt-2'>
            <div className='author caption2 text-secondary'>
            by <span className='text-on-surface'>Admin</span>
            </div>
            <div className='item-date flex items-center'>
                <Icon.CalendarBlank weight='bold'/>
                <span className='ml-1 caption2'>{formattedDate}</span>
               
                <div className='caption2 py-1 px-3 bg-surface rounded-full inline-block capitalize bg-blue-100'>
                {blogDetails.category_name }  </div>
                
            </div> 
        </div> 
      

        <div className='body2 text-secondary mt-4'>
        {getTextFromHTML(blogDetails.long_descp) }
        </div> 
         </div>

      </div>


    <div className='w-full xl:w-1/4'>
        <div className='more-infor border border-line rounded-xl py-8 px-8'>
            <div className='heading6'>
            Categories
            </div> 

        <div className='list-nav mt-4'>
            <Link className='nav-item rounded-lg flex-between p-6' href='/'>
            <div className='text-button text-secondary'>
            payment solution
            </div>
            </Link>

            <Link className='nav-item rounded-lg flex-between p-6' href='/'>
            <div className='text-button text-secondary'>
            personal finance
            </div>
            </Link>

            <Link className='nav-item rounded-lg flex-between p-6' href='/'>
            <div className='text-button text-secondary'>
            online banking
            </div>
            </Link>


            <Link className='nav-item rounded-lg flex-between p-6' href='/'>
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

export default BlogDetails;