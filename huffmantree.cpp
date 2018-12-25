#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#define N 127
#define M 2*N-1
typedef char **HuffmanCode;
typedef struct{
	int weight;
	char data; 
	int parent,Lchild,Rchild;
}HTNode,*HuffmanTree;
int bucket[N];
void Select(HuffmanTree HT, int i,int *s1,int *s2)
{
	int j;
	*s1 = 0;
	*s2 = 0;
	for (j = 1; j <= i; j++)
	{
		if (HT[j].parent == 0 && HT[*s1].weight > HT[j].weight)
		{
			*s2 = *s1;
			*s1 = j;
		}
		else if (HT[j].parent == 0 && HT[*s2].weight > HT[j].weight)
			*s2 = j;
	}
}

HTNode * CrtHuffmanTree(HuffmanTree	ht,int n){ //创建 
	int m, i,j, s1, s2;
	if (n <= 1)
		return ht;
	m = 2 * n - 1;
	ht = (HTNode *)malloc(sizeof(HTNode)*(m + 1));
	for (i = 1; i <= m; i++)
	{
		ht[i].parent = 0;
		ht[i].Lchild = 0;
		ht[i].Rchild = 0;
	}
	ht[0].weight = 9999;
	for(i=0,j=1;i<N;i++){       //初始化 哈夫曼0号单元不用 j开始 
		if(bucket[i]!=0){
			ht[j].weight=bucket[i];	
			if(0<=i&&i<=127)
			{
				ht[j].data = i;
			}		
			j++;
		}
	}	
	printf("输出哈夫曼树：\n字符\t  权值\t  父节点 \t 左孩子节点\t 右孩子节点\n");
	for(i=1;i<m+1;i++){
		printf("%c \t %d \t %d\t  %d \t %d\n",ht[i].data,ht[i].weight,ht[i].parent,ht[i].Lchild,ht[i].Rchild);
	}
	for (i = n + 1; i <= m; i++)
	{
		Select(ht, i - 1, &s1, &s2);
		ht[i].Lchild = s1;
		ht[i].data='-';
		ht[i].Rchild = s2;
		ht[s1].parent = i;
		ht[s2].parent = i;
        ht[i].weight = ht[s1].weight + ht[s2].weight;
	}
	return ht;
}
HuffmanCode codinghuffman(HuffmanTree	ht,HuffmanCode hc,int n){ //编码 
	int i, start, f, c;
	char *cd;
	hc = (char **)malloc(sizeof(char *)*(n + 1));
	cd = (char *)malloc(sizeof(char)*n);
	cd[n - 1] = '\0';
	for (i = 1; i <= n; i++)
	{
		start = n - 1;
		c = i;
		f = ht[i].parent;
		while (f != 0)
		{
			--start;
			if (c == ht[f].Lchild)
				cd[start] = '0';
			else
				cd[start] = '1';
			c = f;
			f = ht[f].parent;
		}
		hc[i] = (char *)malloc(sizeof(char)*(n - start));
		strcpy(hc[i], &cd[start]);
	}
	free(cd);
	return hc;
}
void decodeHuffmanTree(HuffmanTree ht,int n,char *str){  //解码 
	printf("译码如下：\n"); 
	int i,j;
	int p=2*n-1; // p当前节点，p当前节点儿子
	FILE *fp;
	fp=fopen("decode.txt","w");
	fclose(fp);
	fp=fopen("decode.txt","a");
	for(i=0;str[i];i++){
		if(str[i]=='1'){
			p = ht[p].Rchild;
		}else if(str[i]=='0'){
			p = ht[p].Lchild;
		}
		if(ht[p].Lchild==0&&ht[p].Rchild==0){  //当前字段解码完毕 
			fputc(ht[p].data,fp);
			p =2*n-1; 
		}
	} 
	fclose(fp);
}
void statistics(char *str){  
	int i;
	for(i=0;i<N;i++){
		bucket[i]=0;
	}
	for(i=0;str[i];i++){
		if('\0'<=str[i]&&str[i]<='~')
		{
			bucket[str[i]]++;
		}
			
	}
} 
int WPL(HuffmanTree ht,int n){
	int wpl=0;
	int h;
	int p;
	int i;
	for(i=0;i<n;i++){
		h=0;
		for(p=i;ht[p].parent!=-1;p=ht[p].parent){
			h++;
		}
		wpl = wpl+ h*ht[i].weight;
	}
	return wpl;
}
char *  getFileContent(char *pathname)
{
    char* text;
    FILE *pf = fopen(pathname,"r");
    fseek(pf,0,SEEK_END);
    long lSize = ftell(pf);
    printf("文件长度：%d\n",lSize);
    text=(char *)malloc(sizeof(char)*(lSize+1));
    rewind(pf);
    fread(text,sizeof(char),lSize,pf);
    text[lSize] = '\0';
    fclose(pf); 
    return text;
}
char * ArticleCode(HuffmanTree ht,HuffmanCode hc,char *text,int n){
	int i,j;
	FILE *fp;
	fp=fopen("code.txt","w");
	fclose(fp);
	fp=fopen("code.txt","a");
	//原文章
	printf("原文章：\n"); 
	puts(text);
	printf("原文章的编码读入文件：\n");
	for(i=0;text[i];i++){
		for(j=1;j<n+1;j++){
			if(text[i]==ht[j].data){
				fputs(hc[j],fp);
			}	
		}
		
	} 
	fclose(fp);
}

int main(){
	HuffmanTree ht;
	HuffmanCode hc;
	int count=0,i;
	char *text;
	char *articlecode;
	char *codetext;
	char *decodetext;
	printf("将读取文件的内容！\n");	
	char pathname[20]="souce.txt";
	text= getFileContent(pathname);
	printf("原文的内容！\n");
	puts(text);
	statistics(text);
	for(i=0;i<N;i++){
		if(bucket[i]!=0)
			count++;
	}
	printf("存放字符统计表：\n");
	for(i=0;i<N;i++){
		printf("%d ",bucket[i]);
	}
	printf("一共有%d个字符\n",count);
	ht=CrtHuffmanTree(ht,count);//创建 
	printf("输出哈夫曼树：\n字符\t  权值\t  父节点 \t 左孩子节点\t 右孩子节点\n");
	for(i=1;i<count*2;i++){
		printf("%c \t %d \t %d\t  %d \t %d\n",ht[i].data,ht[i].weight,ht[i].parent,ht[i].Lchild,ht[i].Rchild);
	}
	hc=codinghuffman(ht,hc,count);//字符编码表 
	printf("输出各字符编码如下：\n");
	for(i=1;i<count+1;i++){
		printf("%c\t",ht[i].data);
		puts(hc[i]);
		printf("\n");
	}
	printf("\n");
	articlecode=ArticleCode(ht,hc,text,count);//文章的全部编码 
	char pathname1[20]="code.txt";
	codetext= getFileContent(pathname1);
	printf("原文编码的内容！\n");
	puts(codetext);
	decodeHuffmanTree(ht,count,codetext);//译码并存到文件decode.txt中 
	char pathname2[20]="decode.txt";
	decodetext= getFileContent(pathname2); 
	printf("译码得到的内容！\n");
	puts(decodetext); 
	return 0;
}
