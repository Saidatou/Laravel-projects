'use client'
import Image from 'next/image';
import Link from 'next/link';
import React, { useEffect, useState } from 'react';
import * as Icon from '@phosphor-icons/react/dist/ssr'
import { API_BASE_URL, IMAGE_BASE_URL } from '@/config/config';
import ClipLoader from 'react-spinners/ClipLoader';

const BlogList = ( ) => {

    const [blog, setBlog] = useState([]);
    const [categories, setCategories] = useState([]);
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [loading, setLoading] = useState(true);
    // console.log(sliders)

    useEffect(() => {
        const fetchItem = async () => {
            setLoading(true);
            try {
                const url = selectedCategory
                ? `${API_BASE_URL}/category/${selectedCategory}/blogs`
                : `${API_BASE_URL}/allblog`;
                const response = await fetch(url);  
                const data = await response.json();
                setBlog(data);
            } catch (error) {
                console.error('Error fetching data',error);
            } finally {
                setLoading(false);
            }
        };
        fetchItem();
    },[selectedCategory]);

    useEffect(() => {
        const fetchCatItem = async () => {
            try {
                const response = await fetch(`${API_BASE_URL}/blogcat`);
                const data = await response.json();
                setCategories(data);
            } catch (error) {
                console.error('Error fetching data',error);
            } finally {
                setLoading(false);
            }
        };
        fetchCatItem();
    },[]);

    const handleCategoryClick = (categoryId) => {
        setSelectedCategory(categoryId);
    }

    const getTextFromHTML = (html, limit = 300) => {
        const div = document.createElement('div');
        div.innerHTML = html;
        const text = div.textContent || div.innerText || '';
        return text.length > limit ? text.substring(0,limit) + '...' : text;
    }

 
return (
<div className='list-blog lg:py-[100px] sm:py-16 py-10'>
    <div className='container'>
        <div className='flex max-lg:flex-col gap-y-10'>
            <div className='w-full lg:w-2/3'>

    {
        loading ? ( 
            <div className='flex justify-center items-center h-[500px]'>
                <ClipLoader color='#3498db' size={50} />
            </div>
        ) : (
            <div className='list flex flex-col gap-y-10'>
            {
                blog.slice(0, 6).map(( item,index ) => {
                    const formattedDate = new Date(item.created_at).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    return ( 
<Link className='blog-item flex max-md:flex-col md:items-center gap-7 gap-y-5' href={'/blog/blog-details/[slug]'}
                as={`/blog/blog-details/${item.post_slug.toLowerCase().replace(/ /g,'-')}`}
                 >
        
                <div className='w-full md:w-1/2'>
                <div className='bg-img w-full overflow-hidden rounded-2xl'>
                    <Image width={5000} height={5000} className='w-full h-full block' src={`${IMAGE_BASE_URL}/${item.image}`} />  
                </div> 
                </div>
        
            <div className='w-full md:w-1/2'>
            <div className='caption2 py-1 px-3 bg-surface rounded-full inline-block capitalize bg-slate-100'>
            {item.category_name}
            </div>
            <div className='heading6 mt-2'>{item.post_title}</div>
            <div className='date flex items-center gap-4 mt-2'>
                <div className='author caption2 text-secondary'> By <span className='text-onsurface'>Admin</span> 
                </div>
        
                <div className='item-date flex items-center'>
                    <Icon.CalendarBlank weight='bold' />
                    <span className='ml-1 caption2'>{formattedDate}</span> 
                </div> 
            </div>
        
            <div className='body3 text-secondary mt-4 pb-4'> {getTextFromHTML(item.long_descp) }</div>
            <div className='read font-bold underline'>Read More</div>
        
            </div>
                
                </Link>
                    )} 
                )
            } 
              </div> 

         )

    }
    


           
            </div>
    

    <div className='w-full lg:w-1/3 lg:pl-[55px]'>
    <div className='search-block rounded-lg bg-surface h-[50px] relative'>
        <input className='rounded-lg bg-surface w-full h-full pl-4 pr-12 bg-slate-100' type="text" placeholder='Search' />
        <Icon.MagnifyingGlass className='absolute top-1/2 -translate-y-1/2 right-4 text-xl cursor-pointer' /> 
    </div>

    <div className='cate-block md:mt-10 mt-6'>
        <div className='heading6'>Blog Category</div> 

        <div className='list-nav mt-4'>
            <div className={`text-button text-secondary mt-2 cursor-pointer ${selectedCategory === null ? 'font-extrabold' : ''} `} onClick={() => handleCategoryClick(null)}>
            All Category 
            </div>
            
        {
            categories.map((cat) => (
           <div key={cat.id} className={`text-button text-secondary mt-2 cursor-pointer ${selectedCategory === cat.id ? 'font-extrabold' : ''} `} onClick={() => handleCategoryClick(cat.id)} >
           { cat.blog_category }
            </div>
            ))
        }     
            
             

        </div>  
    </div>


    <div className='recent-post-block md:mt-10 mt-6'>
        <div className='recent-post-heading heading7'>Recent Post</div>
        <div className='list-recent-post flex flex-col gap-6 mt-4'>
            {
                blog.slice(0,3).map((item, index) => (
                <Link key={index} className='recent-post-item flex items-start gap-4 cursor-pointer' href={'/blog/blog-details/[slug]'}
                as={`/blog/blog-details/${item.post_slug.toLowerCase().replace(/ /g,'-')}`}>
            <div className='item-img flex-shrink-0 w-20 h-20 rounded'>
                <Image width={5000} height={5000} src={`${IMAGE_BASE_URL}/${item.image}`} className='w-full h-full object-cover'/> 
            </div>

            <div className='item-infor w-full'>
                <div className='item-date flex items-center'>
                <Icon.CalendarBlank weight='bold' />
                <span className='ml-1 caption2'>
                {new Date(item.created_at).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })}</span>  
                </div>
                <div className='item-title mt-1'>{item.post_title}</div>

            </div>
                
                </Link>

                ))
            }

        </div>

    </div>



    </div> 
        </div> 
    </div>
    
</div>
);

};

export default BlogList;